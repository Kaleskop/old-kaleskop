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
