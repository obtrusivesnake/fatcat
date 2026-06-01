<?php

return function ($kirby, $page) {
    $form_submitted = false;
    $errors = [];
    $form_data = [];

    if ($kirby->request()->is('POST')) {
        $form_data = $kirby->request()->data();

        // Minimal required-field validation
        $required = [
            "first_name" => "First name",
            "email" => "Email",
            "contact_method" => "Preferred contact method",
            "days" => "Availability (days)",
            "times" => "Preferred times",
            "dances" => "Dances you want to learn",
            "instructor_pref" => "Instructor preference",
            "attendees" => "Who is coming",
            "experience" => "Experience level",
            "goals" => "Dance goals",
        ];

        foreach ($required as $field => $label) {
            if (empty($form_data[$field])) {
                $errors[] = $label . " is required.";
            }
        }

        if (
            !empty($form_data["email"]) &&
            !filter_var($form_data["email"], FILTER_VALIDATE_EMAIL)
        ) {
            $errors[] = "Please enter a valid email address.";
        }

        if (empty($errors)) {
            // TODO: send email / persist to DB here.
            $form_submitted = true;
        }
    }

    return [
        'form_submitted' => $form_submitted,
        'errors' => $errors,
        'form_data' => $form_data,
    ];
};
