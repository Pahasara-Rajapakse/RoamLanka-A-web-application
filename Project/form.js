       function validateForm() {
            
            var destination = document.getElementById('destination').value;
            if (destination === "") {
                alert('Please select a destination');
                return false;
            }


            var firstName = document.getElementById('name').value;
            var lastName = document.getElementById('lname').value;
            if (firstName.trim() === "" || lastName.trim() === "") {
                alert('Please enter your full name');
                return false;
            }

       
            var street1 = document.getElementById('s1').value;
            var city = document.getElementById('ci').value;
            var country = document.getElementById('po').value;
            if (street1.trim() === "" || city.trim() === "" || country.trim() === "") {
                alert('Please enter your complete address');
                return false;
            }

         
            var phoneNumber = document.getElementById('name').value;
            if (phoneNumber.trim() === "") {
                alert('Please enter your phone number');
                return false;
            }

         
            var email = document.getElementById('lname').value;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address');
                return false;
            }
			
            var adults = document.getElementById('ad').value;
            if (adult <= 0) {
                alert('Informaton cannot be less than or equal 0');
                return false;
            }	

            var creditCard = document.getElementById('credit-card').checked;
            var paypal = document.getElementById('paypal').checked;

            if (!creditCard && !paypal) {
                alert('Please select a payment method');
                return false;
            }			


            return true;
        }