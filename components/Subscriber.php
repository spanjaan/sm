<?php namespace SpAnjaan\Sm\Components;

use Flash;
use Mail;
use Cms\Classes\ComponentBase;
use Validator;
use ValidationException;
use SpAnjaan\Sm\Models\Project;
use SpAnjaan\Sm\Models\Contact;

class Subscriber extends ComponentBase
{
    public $projectOptions; // Define a public property for project options.

    public function componentDetails()
    {
        return [
            'name' => 'Subscriber Component',
            'description' => 'Handles newsletter subscriptions.',
        ];
    }

    public function onRun()
    {
        // Load JS file if required
        $this->addJs('/plugins/spanjaan/sm/assets/js/formreset.js');

        // Fetch and pass project options to the page
        $this->page['projectOptions'] = $this->getProjectOptions();
    }

    protected function getProjectOptions()
    {
        // Fetch project options from the database
        return Project::pluck('name', 'id')->toArray();
    }

    public function onSubscribe()
    {
        // Capture form input
        $data = [
            'email' => post('email'),
            'projects' => post('projects', []), // Handle case where no projects are selected
        ];
        
        // Custom validation messages
        $messages = [
            'projects.required' => 'Please check at least one topic.', // Custom message for 'min:1'
            'email.required' => 'The email field is required.',   // Add custom messages for email validation (optional)
            'email.email' => 'Please provide a valid email address.',
        ];

        // Validate form input
        $validator = Validator::make($data, [
            'email' => 'required|email',
            'projects' => 'required|array|min:1', // Ensure at least one project is selected
        ], $messages);


        // Handle validation errors
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        // Check if the email is already in the database
        if (Contact::where('email', $data['email'])->exists()) {
            throw new ValidationException([
                'email' => 'This email is already subscribed.',
            ]);
        }

        try {
            // Find or create the contact by email
            $contact = Contact::firstOrCreate(['email' => $data['email']]);

            // Attach selected projects to the contact without detaching existing ones
            $contact->projects()->syncWithoutDetaching($data['projects']);

            // Send confirmation email
            $this->sendConfirmationEmail($data);

            // Display success message
            Flash::success('Thank you for subscribing!');
        } catch (\Exception $e) {
            // Handle errors gracefully
            Flash::error('An error occurred while processing your subscription.');
            \Log::error($e->getMessage());
        }
    }

    protected function sendConfirmationEmail(array $data)
    {
        try {
            $emailParts = explode('@', $data['email']);
            $usernameEmail = $emailParts[0];
            $toName = post('firstname') ?: $usernameEmail;

            $params = ['name' => $toName];

            Mail::queue('spanjaan.sm::mail.confirmed_opt_in', $params, function ($message) use ($data) {
                $message->to($data['email']);
            });
        } catch (\Exception $e) {
            \Log::error('Unable to send confirmation email: ' . $e->getMessage());
        }
    }
}
