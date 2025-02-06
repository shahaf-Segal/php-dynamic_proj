<h1>contact us </h1>
<form method="post">
    <input type="hidden" name="csrf_token" value="<?= getCsrfToken(); ?>">

    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="message">Message</label>
        <textarea name="message" id="message" rows="5"></textarea>
    </div>
    <button type="submit">Send Message</button>

</form>