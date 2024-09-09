<!DOCTYPE html>
<html>

<body>
  <h2>New Contact Form Submission</h2>
  <p><strong>Name:</strong> {{ $data['name'] }}</p>
  <p><strong>Email:</strong> {{ $data['email'] }}</p>
  <p><strong>Message:</strong></p>
  <p>{{ $data['message'] }}</p>
</body>

</html>