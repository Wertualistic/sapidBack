<head>
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap');

        .input {
            width: 100%;
            position: relative;
        }

        .input input {
            width: 100%;
            height: 50px;
            font-size: 18px;
            padding: 0 30px;
            border: 3px solid #893168;
            border-radius: 5px;
            outline: none;
        }

        .input i {
            position: absolute;
            right: 5%;
            top: 35%;
            cursor: pointer;
        }

        .validations {
            width: 100%;
            margin: 20px 10px;
            text-align: center;
        }

        .validations p {
            font-weight: 600;
        }

        .allChecks {
            width: 100%;
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .allChecks li {
            width: 180px;
            font-size: 10px;
            font-weight: 500;
            color: #893168;
            text-align: start;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        section {
            position: relative;
            min-height: 100vh;
            background-color: #353C48;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        section .container {
            position: relative;
            width: 1000px;
            height: 700px;
            background: #fff;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        section .container .user {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
        }

        section .container .user .imgBx {
            position: relative;
            width: 50%;
            height: 100%;
            background: #ff0;
            transition: 0.5s;
        }

        section .container .user .imgBx img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        section .container .user .formBx {
            position: relative;
            width: 50%;
            height: 100%;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            transition: 0.5s;
        }

        section .container .user .formBx form h2 {
            font-size: 18px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-align: center;
            width: 100%;
            margin-bottom: 10px;
            color: #555;
        }

        section .container .user .formBx form input {
            position: relative;
            width: 100%;
            padding: 10px;
            background: #f5f5f5;
            color: #333;
            border: none;
            outline: none;
            box-shadow: none;
            margin: 8px 0;
            font-size: 14px;
            letter-spacing: 1px;
            font-weight: 300;
        }

        section .container .user .formBx form button {
            max-width: 100px;
            background: #677eff;
            color: #fff;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 1px;
            transition: 0.5s;

            position: relative;
            width: 100%;
            padding: 10px;
            border: none;
            outline: none;
            box-shadow: none;
            margin: 8px 0;
            font-size: 14px;
            letter-spacing: 1px;
            font-weight: 300;
        }

        section .container .user .formBx form .signup {
            position: relative;
            margin-top: 20px;
            font-size: 12px;
            letter-spacing: 1px;
            color: #555;
            text-transform: uppercase;
            font-weight: 300;
        }

        section .container .user .formBx form .signup a {
            font-weight: 600;
            text-decoration: none;
            color: #677eff;
        }

        section .container .signupBx {
            pointer-events: none;
        }

        section .container.active .signupBx {
            pointer-events: initial;
        }

        section .container .signupBx .formBx {
            left: 100%;
        }

        section .container.active .signupBx .formBx {
            left: 0;
            padding-top: 100px;
            overflow-x: auto;
        }

        section .container .signupBx .imgBx {
            left: -100%;
        }

        section .container.active .signupBx .imgBx {
            left: 0%;
        }

        section .container .signinBx .formBx {
            left: 0%;
        }

        section .container.active .signinBx .formBx {
            left: 100%;
        }

        section .container .signinBx .imgBx {
            left: 0%;
        }

        section .container.active .signinBx .imgBx {
            left: -100%;
        }

        @media (max-width: 991px) {
            section .container {
                max-width: 400px;
            }

            section .container .imgBx {
                display: none;
            }

            section .container .user .formBx {
                width: 100%;
            }
        }
    </style>
    <section>
        <div class="container">
            <div class="user signinBx">
                <div class="imgBx"><img
                        src="https://i.guim.co.uk/img/media/cafde7a01a03c8122739f3e710a3d4ce45bfa5fb/0_111_3500_2100/master/3500.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=a891177c41da93174785d4d216426256"
                        alt="" /></div>
                <div class="formBx">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <h2>Sign In</h2>
                        <input type="email" name="email" placeholder="Email" />
                        <input type="password" name="password" placeholder="Password" />
                        <button type="submit">Login</button>
                        <p class="signup">
                            Don't have an account ?
                            <a href="#" onclick="toggleForm();">Sign Up.</a>
                        </p>
                        <p>
                            <a href="{{ route('password.email') }}">Forgot your password?</a>
                        </p>
                    </form>
                </div>
            </div>
            <div class="user signupBx">
                <div class="formBx">
                    <form id="register" action="{{ route('register') }}" method="POST">
                        @csrf
                        <h2>Create an account</h2>
                        <input type="text" name="name" placeholder="Name" />
                        <input type="email" name="email" placeholder="Email Address" />
                        <div class="validationss">

                        </div>
                        <div class="input">
                            <input type="password" name="password" placeholder="Password" autocomplete="off">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="validations">
                            <ul class="allChecks">
                                <li>At least 10 Characters Long</li>
                                <li>At least 1 UpperCase letter (A,B,...Z)</li>
                                <li>At least 1 lowercase letter (a,b,...z)</li>
                                <li>At least 1 special symbol (!,@,...$)</li>
                                <li>At least 1 Number (0,1,2...9)</li>
                            </ul>
                        </div>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" />
                        <button type="submit">Register</button>
                        <p class="signup">
                            Already have an account ?
                            <a href="#" onclick="toggleForm();">Sign in.</a>
                        </p>
                    </form>
                </div>
                <div class="imgBx"><img
                        src="https://www.tasteofhome.com/wp-content/uploads/2023/09/The-Best-Fast-Food-Fried-Chicken-Ranked_Kristina-Va%CC%88nni-for-Taste-of-Home_Fried-Chicken-Group-Hero-Shot_FT.jpg"
                        alt="" /></div>
            </div>
        </div>
    </section>
    <script>
        const toggleForm = () => {
            const container = document.querySelector('.container');
            container.classList.toggle('active');
        };
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"
        integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        let register = document.getElementById('register');
        let emailInput = document.querySelector('#register input[name="email"]');
        let validationsDiv = document.querySelector('.validationss');

        register.addEventListener('submit', async (e) => {
            e.preventDefault();
            const userEmail = emailInput.value;

            const options = {
                method: 'GET',
                url: 'https://validect-email-verification-v1.p.rapidapi.com/v1/verify',
                params: {
                    email: userEmail,
                },
                headers: {
                    'X-RapidAPI-Key': 'a28a93b0c5msh3dcfd7d0796e3a2p170a1djsnfef0a6b1bd13',
                    'X-RapidAPI-Host': 'validect-email-verification-v1.p.rapidapi.com'
                }
            };

            try {
                const response = await axios.request(options);

                console.log(response.data);

                if (response.data.status == 'invalid') {
                    validationsDiv.innerHTML = '<p style="color: red">Email is invalid</p>';
                    console.log('Invalid email response');
                } else {
                    validationsDiv.innerHTML = '';

                    console.log('Valid email response');
                    register.submit();

                }
            } catch (error) {
                console.error(error);
            }
        });
    </script>

    <script>
        const inputEl = document.querySelector(".input input");
        const eyeEl = document.querySelector(".input i");
        const checkListEl = document.querySelectorAll(".allChecks li");

        // regex means regular expression and here, I have taken separate regex & index in a check array.
        // You don't need to remember all these expressions and you can refer from below link.
        // Regular expression checks were took from https://www.section.io/engineering-education/password-strength-checker-javascript/
        // you can refer any other site also but I referred this website.
        const checks = [{
                regex: /.{10,}/,
                index: 0
            }, // At least of 10 characters
            {
                regex: /[A-Z]/,
                index: 1
            }, // At least upperCase
            {
                regex: /[a-z]/,
                index: 2
            }, // At least one lowerCase
            {
                regex: /[^A-Za-z0-9]/,
                index: 3
            }, // At least one special character
            {
                regex: /[0-9]/,
                index: 4
            } // At least one uppercase letter
        ]

        inputEl.addEventListener("keyup", (event) => {
            checks.forEach(e => {

                // it checks if the password matches the check regex
                const valid = e.regex.test(event.target.value);
                const checkItem = checkListEl[e.index];

                // if regex is valid then it adds text decoration to line-through or else none.
                if (valid) {
                    checkItem.style = "text-decoration: line-through";
                } else {
                    checkItem.style = "text-decoration: none";
                }
            });
        });

        // when we click on eye icon It toggles between eye icon slash & eye icon and also input toggles between text and password based on the eye icon.
        eyeEl.addEventListener("click", () => {
            eyeEl.className = `fa-solid fa-eye${inputEl.type === "password" ? "" : "-slash"}`;
            inputEl.type = inputEl.type === "password" ? "text" : "password";
        });
    </script>
</body>
