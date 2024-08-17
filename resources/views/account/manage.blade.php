<!DOCTYPE html>
<html>
<head>
    <title>Manage Account</title>
</head>
<body>
    <h1>Manage Account</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if(isset($profile->driver_name))
            <!-- Driver profile fields -->
            <label for="driver_name">Driver Name:</label>
            <input type="text" id="driver_name" name="driver_name" value="{{ old('driver_name', $profile->driver_name) }}"><br>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="{{ old('city', $profile->city) }}"><br>

            <label for="driving_license">Driving License:</label>
            <input type="text" id="driving_license" name="driving_license" value="{{ old('driving_license', $profile->driving_license) }}"><br>

            <label for="vehicle_registration">Vehicle Registration:</label>
            <input type="text" id="vehicle_registration" name="vehicle_registration" value="{{ old('vehicle_registration', $profile->vehicle_registration) }}"><br>

            <label for="vehicle_id">Vehicle ID:</label>
            <input type="text" id="vehicle_id" name="vehicle_id" value="{{ old('vehicle_id', $profile->vehicle_id) }}"><br>

            <label for="photo">Photo:</label>
            <input type="file" id="photo" name="photo"><br>
            
        @elseif(isset($profile->email))
            <!-- Customer profile fields -->
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $profile->email) }}"><br>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $profile->phone_number) }}"><br>
        @endif

        <label for="password">New Password:</label>
        <input type="password" id="password" name="password"><br>

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation"><br>

        <button type="submit">Update Profile</button>
    </form>
</body>
</html>
