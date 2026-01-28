

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-step Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
             
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction:column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .registration-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        .form-section {
            display: none;
        }
        .form-section.active {
            display: block;
        }
        .step-indicator {
            display: flex;
            justify-content: space-between;

            margin-bottom: 20px;
        }
        .step-indicator div {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #ddd;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color: #fff;
        }
        .step-indicator div.active {
            background-color: #007bff;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>

<!-- PHP CODE -->

<?php

include ('database/db.php');

if(isset($_POST['submit'])){

                    
                        $fname = $_POST['f_name'];
                        $lname = $_POST['l_name'];
                        $reg = $_POST['reg_no'];
                        $course = $_POST['course'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $pass = $_POST['pass_2'];

                                        
                    try{
                            
                        $sql = "INSERT INTO users(First_Name, Last_Name,Reg_No, Course,Email, Phone, Pass) 
                        VALUES('$fname', '$lname', '$reg', '$course', '$email', '$phone', '$pass')";
                        mysqli_query($conn, $sql);

                        echo"
                        <div class='alert alert-success' role='alert'>
                            Registered Successfully!
                        </div></br>
                        ";

                    }catch(mysqli_sql_exception){
                        echo"
                        <div class='alert alert-danger' role='alert'>
                            We could not verify your details! kindly check and try again!
                        </div></br>
                        ";
                    }


}
 
?>

<!-- PHP END -->


<div class="registration-container">
    <h2 class="text-center mb-4">Registration Form</h2>

    <!-- Step Numbers -->
    <div class="step-indicator">
        <div class="step" id="stepNumber1">1</div>
        <div class="step" id="stepNumber2">2</div>
        <div class="step" id="stepNumber3">3</div>
        <div class="step" id="stepNumber4">4</div>
    </div>

    <form id="registrationForm" action="register.php" method="POST">
        <!-- Step 1 -->
        <div class="form-section active" id="step1">
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name='f_name' required>
                <div class="invalid-feedback">Please enter your first name.</div>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name='l_name' required>
                <div class="invalid-feedback">Please enter your last name.</div>
            </div>
            <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
        </div>

        <!-- Step 2 -->
        <div class="form-section" id="step2">
            <div class="mb-3">
                <label for="regNumber" class="form-label">Registration Number</label>
                <input type="text" class="form-control" id="regNumber" name='reg_no' required>
                <div class="invalid-feedback">Please enter your registration number.</div>
            </div>
            <div class="mb-3">
                <label for="course" class="form-label">Course</label>
                <input type="text" class="form-control" id="course" name='course' required>
                <div class="invalid-feedback">Please enter your course.</div>
            </div>
            <button type="button" class="btn btn-secondary mb-3" onclick="prevStep()">Previous</button>
            <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
        </div>



    <!-- Step 3 -->
        <div class="form-section" id="step3">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name='email' required>
                <div class="invalid-feedback">Please enter a valid email address.</div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name='phone' required pattern="[0-9]{10}">
                <div class="invalid-feedback">Please enter a valid phone number (10 digits).</div>
            </div>
            <button type="button" class="btn btn-secondary mb-3" onclick="prevStep()">Previous</button>
            <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
        </div>


        <!-- Step 4 -->
        <div class="form-section" id="step4">
            <div class="mb-3">
                <label for="email" class="form-label">Create Password</label>
                <input type="password" class="form-control"  name='pass_1' required>
                <div class="invalid-feedback">Please enter valid password.</div>
            </div>
            <div class="mb-3">
                <label for="Confirm password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control"  name='pass_2' required>
                <div class="invalid-feedback">Password should match.</div>
            </div>
            <button type="button" class="btn btn-secondary mb-3" onclick="prevStep()">Previous</button>
            <button type="submit" name='submit' class="btn btn-primary">Register</button>
        </div>


    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    let currentStep = 1;

    // Move to the next step
    function nextStep() {
        const currentSection = document.querySelector(`#step${currentStep}`);
        const inputs = currentSection.querySelectorAll('input');
        let valid = true;

        inputs.forEach(input => {
            if (!input.checkValidity()) {
                valid = false;
                input.classList.add('is-invalid');
            } else {
                input.classList.remove('is-invalid');
            }
        });

        if (valid) {
            currentStep++;
            updateForm();
        }
    }

    // Move to the previous step
    function prevStep() {
        currentStep--;
        updateForm();
    }

    // Update form to show the correct section and update step numbers
    function updateForm() {
        document.querySelectorAll('.form-section').forEach((section, index) => {
            section.classList.toggle('active', index === currentStep - 1);
        });

        document.querySelectorAll('.step').forEach((step, index) => {
            step.classList.toggle('active', index === currentStep - 1);
        });
    }

    // Handle form submission
</script>

</body>
</html>
