// Hitarth Patel, IT-202, Internet Applications, Unit 10 Exercise, hp627@njit.edu
function validateCents() {
 const calculateButton = document.getElementById("calculate");
 const centsInput = document.getElementById("cents");
 let cents = centsInput.value;
 console.log("cents =", cents);
 if (cents.trim() === "" || isNaN(cents) || cents < 0 || cents > 99) {
   centsInput.style.color = "red";
   calculateButton.disabled = true;
 } else {
   centsInput.style.color = "black";
   calculateButton.disabled = false;
 }
}
function makeChange() {
 let cents = parseInt(document.getElementById("cents").value, 10);
 const quarters = parseInt(cents / 25);  // get number of quarters
 console.log("quarters =", quarters);
 cents = cents % 25;                     // assign remainder to cents variable
 const dimes = parseInt(cents / 10);     // get number of dimes
 cents = cents % 10;                     // assign remainder to cents variable
 const nickels = parseInt(cents / 5);    // get number of nickels
 const pennies = cents % 5;              // get number of pennies
 console.log("dimes =", dimes);
 console.log("nickels =", nickels);
 console.log("pennies =", pennies);
 // display the results of the calculations
 document.getElementById("quarters").value = quarters;
 document.getElementById("dimes").value = dimes;
 document.getElementById("nickels").value = nickels;
 document.getElementById("pennies").value = pennies;
};
