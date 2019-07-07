class Kaleshop {
 constructor() {}

 async getConfig() {
  try {
   const config = {
    "stripeKey": "pk_test_DOYNQCzMBiF2g76CGU2fzV3o",
    "currency": "eur"
   };
   return config;
  } catch(err) {
   return { "error": err.message }
  }
 }
}
window.KALESHOP = new Kaleshop();


(async () => {
 "use strict";

 const config = await KALESHOP.getConfig();
 const stripe = new Stripe(config.stripeKey);
 const elements = stripe.elements();

 const errors = document.getElementById("card-errors");
 const form = document.getElementById("checkout-form");

 const card = elements.create("card");
 card.mount("#card-element");
 card.on("change", ({error}) => {
  if (error) {
   errors.textContent = error.message;
   } else {
   errors.textContent = "";
  }
 });

 form.addEventListener("submit", async (evt) => {
  evt.preventDefault();

  const {token, error} = await stripe.createToken(card);

  if (error) {
   errors.textContent = error.message;
   } else {
   tokenHandler(token);
  }
 });

 const tokenHandler = (token) => {
  form.querySelector("input[name=stripeToken]").value = token.id;
  form.submit();
 }

})();
