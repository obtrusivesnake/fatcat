<?php
$page_title = "Private & Group Lessons | Fatcat Ballroom & Dance Company";

// --- Simple submission handling (stub) -----------------------------------
$form_submitted = false;
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
        if (empty($_POST[$field])) {
            $errors[] = $label . " is required.";
        }
    }

    if (
        !empty($_POST["email"]) &&
        !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)
    ) {
        $errors[] = "Please enter a valid email address.";
    }

    if (empty($errors)) {
        // TODO: send email / persist to DB here.
        $form_submitted = true;
    }
}
?>
<?php include "includes/header.php"; ?>

<!-- Page header -->
<section class="pt-32 pb-14 sm:pb-16 px-4 border-b border-white/[0.06]">
    <div class="max-w-4xl mx-auto text-center">
        <!-- GraduationCap icon -->
        <svg class="w-12 h-12 text-[#c9a96e] mx-auto mb-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/>
        </svg>
        <h1 class="font-display text-4xl sm:text-5xl text-white mb-6 font-normal leading-snug">
            Private &amp; Group Lessons
        </h1>
        <p class="text-base text-stone-400 leading-relaxed max-w-xl mx-auto">
            For information about lessons or to schedule a private lesson, complete the form below.
            The details you share help us answer your questions and match you with an instructor who
            teaches the dances you want to learn, on the days you&rsquo;re available.
        </p>
        <p class="text-base text-stone-400 leading-relaxed mt-4 max-w-xl mx-auto">
            Our instructors are independent, so they set their own rates and schedules. There&rsquo;s no
            obligation when receiving a callback, so get in touch - we&rsquo;d love to hear from you!
        </p>
    </div>
</section>

<section class="py-16 md:py-24 px-4">
    <div class="max-w-3xl mx-auto">

        <?php if ($form_submitted): ?>
            <!-- Success state -->
            <div class="text-center py-16">
                <svg class="w-16 h-16 text-[#c9a96e] mx-auto mb-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21.801 10A10 10 0 1 1 17 3.335"/><path d="m9 11 3 3L22 4"/>
                </svg>
                <h2 class="font-display text-3xl text-white mb-4 font-normal">Thanks &mdash; we&rsquo;ll dance together soon!</h2>
                <p class="text-stone-400 text-lg mb-8">
                    We&rsquo;ve received your request and will be in touch shortly to get you scheduled.
                </p>
                <a href="/" class="inline-flex items-center bg-[#c9a96e] hover:bg-[#d4b87d] text-stone-950 font-semibold px-7 py-3.5 rounded transition-colors tracking-wide">
                    Back to Home
                </a>
            </div>
        <?php else: ?>

            <!-- Intro callout -->
            <div class="mb-10 p-6 rounded border border-[#c9a96e]/30 bg-[#c9a96e]/[0.04]">
                <h2 class="font-display text-2xl text-white mb-1 font-normal">No partner? No problem.</h2>
                <p class="text-stone-400">We teach both singles and couples. Please indicate Private or Group lesson in your message.</p>
            </div>

            <?php if (!empty($errors)): ?>
                <div class="mb-8 p-5 rounded border border-red-500/40 bg-red-500/[0.06]">
                    <p class="text-red-300 font-medium mb-2">Please fix the following:</p>
                    <ul class="list-disc list-inside text-red-300/90 text-sm space-y-1">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="/private-lessons.php" class="space-y-12">

                <!-- Personal Information -->
                <fieldset>
                    <legend class="font-display text-2xl text-white mb-6 font-normal w-full border-b border-white/[0.06] pb-3">
                        Personal Information
                    </legend>
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label for="first_name" class="block text-sm text-stone-300 mb-2 tracking-wide">
                                First Name <span class="text-[#c9a96e]">*</span>
                            </label>
                            <input type="text" id="first_name" name="first_name" required
                                   value="<?php echo htmlspecialchars(
                                       $_POST["first_name"] ?? "",
                                   ); ?>"
                                   class="w-full bg-stone-900 border border-white/10 rounded px-4 py-3 text-white placeholder-stone-600 focus:outline-none focus:border-[#c9a96e] focus:ring-1 focus:ring-[#c9a96e] transition-colors">
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm text-stone-300 mb-2 tracking-wide">Last Name</label>
                            <input type="text" id="last_name" name="last_name"
                                   value="<?php echo htmlspecialchars(
                                       $_POST["last_name"] ?? "",
                                   ); ?>"
                                   class="w-full bg-stone-900 border border-white/10 rounded px-4 py-3 text-white placeholder-stone-600 focus:outline-none focus:border-[#c9a96e] focus:ring-1 focus:ring-[#c9a96e] transition-colors">
                        </div>
                        <div>
                            <label for="email" class="block text-sm text-stone-300 mb-2 tracking-wide">
                                Email <span class="text-[#c9a96e]">*</span>
                            </label>
                            <input type="email" id="email" name="email" required
                                   value="<?php echo htmlspecialchars(
                                       $_POST["email"] ?? "",
                                   ); ?>"
                                   class="w-full bg-stone-900 border border-white/10 rounded px-4 py-3 text-white placeholder-stone-600 focus:outline-none focus:border-[#c9a96e] focus:ring-1 focus:ring-[#c9a96e] transition-colors">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm text-stone-300 mb-2 tracking-wide">Phone</label>
                            <input type="tel" id="phone" name="phone"
                                   value="<?php echo htmlspecialchars(
                                       $_POST["phone"] ?? "",
                                   ); ?>"
                                   class="w-full bg-stone-900 border border-white/10 rounded px-4 py-3 text-white placeholder-stone-600 focus:outline-none focus:border-[#c9a96e] focus:ring-1 focus:ring-[#c9a96e] transition-colors">
                        </div>
                    </div>

                    <div class="mt-6">
                        <span class="block text-sm text-stone-300 mb-3 tracking-wide">
                            Preferred Contact Method <span class="text-[#c9a96e]">*</span>
                        </span>
                        <div class="flex flex-wrap gap-3">
                            <?php foreach (["Text", "Email"] as $opt): ?>
                                <label class="inline-flex items-center gap-2.5 px-4 py-2.5 rounded border border-white/10 bg-stone-900 cursor-pointer hover:border-[#c9a96e]/50 transition-colors">
                                    <input type="radio" name="contact_method" value="<?php echo $opt; ?>" required
                                           class="accent-[#c9a96e] w-4 h-4">
                                    <span class="text-stone-300 text-sm"><?php echo $opt; ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </fieldset>

                <!-- Availability -->
                <fieldset>
                    <legend class="font-display text-2xl text-white mb-6 font-normal w-full border-b border-white/[0.06] pb-3">
                        Availability
                    </legend>

                    <div class="mb-7">
                        <span class="block text-sm text-stone-300 mb-3 tracking-wide">
                            Which days are you available? <span class="text-[#c9a96e]">*</span>
                        </span>
                        <div class="flex flex-wrap gap-3">
                            <?php foreach (
                                [
                                    "Monday",
                                    "Tuesday",
                                    "Wednesday",
                                    "Thursday",
                                    "Friday",
                                    "Saturday",
                                ]
                                as $day
                            ): ?>
                                <label class="inline-flex items-center gap-2.5 px-4 py-2.5 rounded border border-white/10 bg-stone-900 cursor-pointer hover:border-[#c9a96e]/50 transition-colors">
                                    <input type="checkbox" name="days[]" value="<?php echo $day; ?>"
                                           class="accent-[#c9a96e] w-4 h-4">
                                    <span class="text-stone-300 text-sm"><?php echo $day; ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div>
                        <span class="block text-sm text-stone-300 mb-3 tracking-wide">
                            What times are best for private lessons? <span class="text-[#c9a96e]">*</span>
                        </span>
                        <div class="flex flex-wrap gap-3">
                            <?php foreach (
                                [
                                    "Morning",
                                    "Early Afternoon",
                                    "Late Afternoon",
                                    "Evening",
                                ]
                                as $time
                            ): ?>
                                <label class="inline-flex items-center gap-2.5 px-4 py-2.5 rounded border border-white/10 bg-stone-900 cursor-pointer hover:border-[#c9a96e]/50 transition-colors">
                                    <input type="checkbox" name="times[]" value="<?php echo $time; ?>"
                                           class="accent-[#c9a96e] w-4 h-4">
                                    <span class="text-stone-300 text-sm"><?php echo $time; ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </fieldset>

                <!-- Dance Preferences -->
                <fieldset>
                    <legend class="font-display text-2xl text-white mb-6 font-normal w-full border-b border-white/[0.06] pb-3">
                        Dance Preferences
                    </legend>

                    <div class="mb-7">
                        <span class="block text-sm text-stone-300 mb-3 tracking-wide">
                            What dances do you want to learn? <span class="text-[#c9a96e]">*</span>
                        </span>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                            <?php foreach (
                                [
                                    "Waltz",
                                    "Foxtrot",
                                    "Tango",
                                    "Ballroom - other",
                                    "Rumba",
                                    "Cha Cha",
                                    "Samba",
                                    "East Coast Swing",
                                    "West Coast Swing/Club",
                                    "Latin - other",
                                    "Country",
                                ]
                                as $dance
                            ): ?>
                                <label class="inline-flex items-center gap-2.5 px-4 py-2.5 rounded border border-white/10 bg-stone-900 cursor-pointer hover:border-[#c9a96e]/50 transition-colors">
                                    <input type="checkbox" name="dances[]" value="<?php echo htmlspecialchars(
                                        $dance,
                                    ); ?>"
                                           class="accent-[#c9a96e] w-4 h-4 flex-shrink-0">
                                    <span class="text-stone-300 text-sm"><?php echo $dance; ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-7">
                        <div>
                            <label for="instructor_pref" class="block text-sm text-stone-300 mb-2 tracking-wide">
                                Instructor preference <span class="text-[#c9a96e]">*</span>
                            </label>
                            <select id="instructor_pref" name="instructor_pref" required
                                    class="w-full bg-stone-900 border border-white/10 rounded px-4 py-3 text-white focus:outline-none focus:border-[#c9a96e] focus:ring-1 focus:ring-[#c9a96e] transition-colors">
                                <option value="" disabled selected>Select one&hellip;</option>
                                <option value="Any">Any</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div>
                            <label for="attendees" class="block text-sm text-stone-300 mb-2 tracking-wide">
                                Who is coming for the lesson? <span class="text-[#c9a96e]">*</span>
                            </label>
                            <select id="attendees" name="attendees" required
                                    class="w-full bg-stone-900 border border-white/10 rounded px-4 py-3 text-white focus:outline-none focus:border-[#c9a96e] focus:ring-1 focus:ring-[#c9a96e] transition-colors">
                                <option value="" disabled selected>Select one&hellip;</option>
                                <option value="One adult">One adult</option>
                                <option value="Couple">Couple</option>
                                <option value="Teen">Teen</option>
                                <option value="Child 6 to 12 years old">Child 6 to 12 years old</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-7">
                        <span class="block text-sm text-stone-300 mb-3 tracking-wide">
                            Have you taken lessons before? <span class="text-[#c9a96e]">*</span>
                        </span>
                        <div class="space-y-2.5">
                            <?php foreach (
                                [
                                    "This will be my first lesson",
                                    "Yes, I've taken some lessons",
                                    "Yes, I've taken many lessons",
                                ]
                                as $exp
                            ): ?>
                                <label class="flex items-center gap-3 px-4 py-3 rounded border border-white/10 bg-stone-900 cursor-pointer hover:border-[#c9a96e]/50 transition-colors">
                                    <input type="radio" name="experience" value="<?php echo htmlspecialchars(
                                        $exp,
                                    ); ?>" required
                                           class="accent-[#c9a96e] w-4 h-4">
                                    <span class="text-stone-300 text-sm"><?php echo htmlspecialchars(
                                        $exp,
                                    ); ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="mt-7">
                        <span class="block text-sm text-stone-300 mb-3 tracking-wide">
                            What are your dance goals? <span class="text-[#c9a96e]">*</span>
                        </span>
                        <div class="space-y-2.5">
                            <?php foreach (
                                [
                                    "Learn basics/Gain confidence",
                                    "Become a better dancer",
                                    "Become an amazing dancer!",
                                    "Enter dance competitions",
                                    "Learn for an upcoming event",
                                ]
                                as $goal
                            ): ?>
                                <label class="flex items-center gap-3 px-4 py-3 rounded border border-white/10 bg-stone-900 cursor-pointer hover:border-[#c9a96e]/50 transition-colors">
                                    <input type="radio" name="goals" value="<?php echo htmlspecialchars(
                                        $goal,
                                    ); ?>" required
                                           class="accent-[#c9a96e] w-4 h-4">
                                    <span class="text-stone-300 text-sm"><?php echo htmlspecialchars(
                                        $goal,
                                    ); ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </fieldset>

                <!-- Additional Information -->
                <fieldset>
                    <legend class="font-display text-2xl text-white mb-6 font-normal w-full border-b border-white/[0.06] pb-3">
                        Additional Information
                    </legend>

                    <div class="mb-7">
                        <label for="message" class="block text-sm text-stone-300 mb-2 tracking-wide">
                            Message <span class="text-stone-600">(please note Private or Group lesson)</span>
                        </label>
                        <textarea id="message" name="message" rows="4"
                                  class="w-full bg-stone-900 border border-white/10 rounded px-4 py-3 text-white placeholder-stone-600 focus:outline-none focus:border-[#c9a96e] focus:ring-1 focus:ring-[#c9a96e] transition-colors resize-y"><?php echo htmlspecialchars(
                                      $_POST["message"] ?? "",
                                  ); ?></textarea>
                    </div>

                    <p class="text-stone-500 text-sm mb-4 tracking-wide uppercase">Planning a wedding dance?</p>

                    <div class="mb-7">
                        <span class="block text-sm text-stone-300 mb-3 tracking-wide">Wedding Dance</span>
                        <div class="flex flex-wrap gap-3">
                            <?php foreach (
                                [
                                    "Bride/Groom",
                                    "Mother/Father",
                                    "Wedding Party",
                                ]
                                as $role
                            ): ?>
                                <label class="inline-flex items-center gap-2.5 px-4 py-2.5 rounded border border-white/10 bg-stone-900 cursor-pointer hover:border-[#c9a96e]/50 transition-colors">
                                    <input type="checkbox" name="wedding_dance[]" value="<?php echo $role; ?>"
                                           class="accent-[#c9a96e] w-4 h-4">
                                    <span class="text-stone-300 text-sm"><?php echo $role; ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label for="wedding_song" class="block text-sm text-stone-300 mb-2 tracking-wide">Wedding Song</label>
                            <input type="text" id="wedding_song" name="wedding_song"
                                   value="<?php echo htmlspecialchars(
                                       $_POST["wedding_song"] ?? "",
                                   ); ?>"
                                   class="w-full bg-stone-900 border border-white/10 rounded px-4 py-3 text-white placeholder-stone-600 focus:outline-none focus:border-[#c9a96e] focus:ring-1 focus:ring-[#c9a96e] transition-colors">
                        </div>
                        <div>
                            <label for="event_type" class="block text-sm text-stone-300 mb-2 tracking-wide">Event Type</label>
                            <input type="text" id="event_type" name="event_type"
                                   value="<?php echo htmlspecialchars(
                                       $_POST["event_type"] ?? "",
                                   ); ?>"
                                   class="w-full bg-stone-900 border border-white/10 rounded px-4 py-3 text-white placeholder-stone-600 focus:outline-none focus:border-[#c9a96e] focus:ring-1 focus:ring-[#c9a96e] transition-colors">
                        </div>
                        <div>
                            <label for="event_date" class="block text-sm text-stone-300 mb-2 tracking-wide">Event Date</label>
                            <input type="date" id="event_date" name="event_date"
                                   value="<?php echo htmlspecialchars(
                                       $_POST["event_date"] ?? "",
                                   ); ?>"
                                   class="w-full bg-stone-900 border border-white/10 rounded px-4 py-3 text-white placeholder-stone-600 focus:outline-none focus:border-[#c9a96e] focus:ring-1 focus:ring-[#c9a96e] transition-colors [color-scheme:dark]">
                        </div>
                    </div>
                </fieldset>

                <!-- Newsletter + submit -->
                <div>
                    <label class="flex items-start gap-3 cursor-pointer mb-8">
                        <input type="checkbox" name="newsletter" value="1"
                               class="accent-[#c9a96e] w-4 h-4 mt-0.5">
                        <span class="text-stone-400 text-sm leading-relaxed">
                            Yes, I want to subscribe to the newsletter and find out about classes, fun events, and more!
                        </span>
                    </label>

                    <button type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center bg-[#c9a96e] hover:bg-[#d4b87d] text-stone-950 font-semibold px-10 py-4 rounded transition-colors tracking-wide">
                        Submit Request
                        <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </form>

        <?php endif; ?>
    </div>
</section>

<?php include "includes/footer.php"; ?>
