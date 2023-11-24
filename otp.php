<?php

function generateOTP() {
    return rand(100000, 999999);
}


function sendOTP($mobile, $otp) {
    
    echo "OTP sent to $mobile: $otp";
}


function verifyOTP($userOTP, $storedOTP) {
    return $userOTP === $storedOTP;
}


$userMobile = '1234567890';


$otp = generateOTP();
sendOTP($userMobile, $otp);


$userEnteredOTP = '123456';


if (verifyOTP($userEnteredOTP, $otp)) {
    echo "Mobile number verified successfully!";
} else {
    echo "Invalid OTP. Please try again.";
}
?>
