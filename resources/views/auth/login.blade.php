<head>
    <title>Registration</title>
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap');

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
            width: 800px;
            height: 500px;
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
                    </form>
                </div>
            </div>
            <div class="user signupBx">
                <div class="formBx">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <h2>Create an account</h2>
                        <input type="text" name="name" placeholder="Name" />
                        <input type="email" name="email" placeholder="Email Address" />
                        <input type="password" name="password" placeholder="Create Password" />
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
</body>