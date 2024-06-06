<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="/css/main.css">
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<body class="body">
    <header>
        <img src="/img/Logo.svg" alt="logo">
        @if(!request()->is('auth'))
            <a class="link-auth" href="/auth">Вихід</a>
        @endif
    </header>
{{--    @include('book_register')--}}
    @yield('content')
    <footer>
        <p class="footer-p">© 2024 | Усі права захищені</p>
    </footer>
    <script>
        function validateForm() {
            var form = document.getElementById('loginForm');
            if (form.checkValidity()) {
                // If all required fields are filled, submit the form
                form.submit();
            } else {
                // If any required field is empty, show validation message
                var inputs = form.querySelectorAll(':invalid');
                inputs.forEach(function(input) {
                    input.classList.add('is-invalid');
                });
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            var inputs = document.querySelectorAll('input');
            inputs.forEach(function(input) {
                input.addEventListener('input', function() {
                    if (this.checkValidity()) {
                        this.classList.remove('is-invalid');
                    } else {
                        this.classList.add('is-invalid');
                    }
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var tomYes = document.getElementById('tom_yes');
            var tomNo = document.getElementById('tom_no');
            var toIncomeBook = document.getElementById('to_income_book');

            // Add event listener to the radio buttons
            tomYes.addEventListener('change', toggleLinkVisibility);
            tomNo.addEventListener('change', toggleLinkVisibility);

            // Function to toggle link visibility based on radio button selection
            function toggleLinkVisibility() {
                if (tomNo.checked) {
                    toIncomeBook.style.display = 'inline-block';
                } else {
                    toIncomeBook.style.display = 'none';
                }
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            var conditionSelect = document.getElementById('condition');
            // Get the textarea block
            var conditionDescrBlock = document.getElementById('condition_descr_block');

            // Listen for changes to the select element
            conditionSelect.addEventListener('change', function() {
                // Check the selected value
                if (conditionSelect.value === '2' || conditionSelect.value === '3') {
                    // Show the textarea block if option 2 or 3 is selected
                    conditionDescrBlock.style.display = 'block';
                } else {
                    // Hide the textarea block if option 1 is selected
                    conditionDescrBlock.style.display = 'none';
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('btn-add-1').addEventListener('click', function() {
                var container = document.getElementById('metals');
                var fieldContainer = container.querySelector('.field-container-1');
                var clonedFieldContainer = fieldContainer.cloneNode(true);
                container.appendChild(clonedFieldContainer);
            });

            document.getElementById('btn-remove-1').addEventListener('click', function() {
                var container = document.getElementById('metals');
                var fieldContainers = container.querySelectorAll('.field-container-1');
                if (fieldContainers.length > 1) {
                    container.removeChild(fieldContainers[fieldContainers.length - 1]);
                }
            });

            document.getElementById('btn-add-2').addEventListener('click', function() {
                var container = document.getElementById('jewelry');
                var fieldContainer = container.querySelector('.field-container-2');
                var clonedFieldContainer = fieldContainer.cloneNode(true);
                container.appendChild(clonedFieldContainer);
            });

            document.getElementById('btn-remove-2').addEventListener('click', function() {
                var container = document.getElementById('jewelry');
                var fieldContainers = container.querySelectorAll('.field-container-2');
                if (fieldContainers.length > 1) {
                    container.removeChild(fieldContainers[fieldContainers.length - 1]);
                }
            });

            document.getElementById('btn-add-3').addEventListener('click', function() {
                var container = document.getElementById('docs');
                var fieldContainer = container.querySelector('.field-container-3');
                var clonedFieldContainer = fieldContainer.cloneNode(true);
                container.appendChild(clonedFieldContainer);
            });

            document.getElementById('btn-remove-3').addEventListener('click', function() {
                var container = document.getElementById('docs');
                var fieldContainers = container.querySelectorAll('.field-container-3');
                if (fieldContainers.length > 1) {
                    container.removeChild(fieldContainers[fieldContainers.length - 1]);
                }
            });
        });

            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('btn-add-4').addEventListener('click', function() {
                    var container = document.getElementById('docs-2');
                    var fieldContainer = container.querySelector('.field-container-4');
                    var clonedFieldContainer = fieldContainer.cloneNode(true);
                    container.appendChild(clonedFieldContainer);
                });

                document.getElementById('btn-remove-4').addEventListener('click', function() {
                    var container = document.getElementById('docs-2');
                    var fieldContainers = container.querySelectorAll('.field-container-4');
                    if (fieldContainers.length > 1) {
                        container.removeChild(fieldContainers[fieldContainers.length - 1]);
                    }
                });
        });


        document.addEventListener('DOMContentLoaded', function() {
            var tomTypeSelect = document.getElementById('tom_type');
            var warningDiv = document.querySelector('.warning');

            tomTypeSelect.addEventListener('change', function() {
                if (tomTypeSelect.value === '2') {
                    warningDiv.style.display = 'flex';
                } else {
                    warningDiv.style.display = 'none';
                }
            });
        });

    </script>
</body>
</html>




