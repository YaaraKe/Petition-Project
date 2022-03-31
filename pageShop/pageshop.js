let googlePayClient;

const tokenizationSpecification = {
  type: "PAYMENT_GATEWAY",
  parameters: {
    gateway: "example",
    gatewayMerchantId: "gatewayMerchantId",
  },
};

const cardPaymentMethod = {
  type: "CARD",
  tokenizationSpecification: tokenizationSpecification,
  parameters: {
    allowedAuthMethods: ["PAN_ONLY", "CRYPTOGRAM_3DS"],
    allowedCardNetworks: ["VISA", "MASTERCARD"],
  },
};

const googlePayConfiguration = {
  apiVersion: 2,
  apiVersionMinor: 0,
  allowedPaymentMethods: [cardPaymentMethod],
};

function onGooglePayLoaded() {
  googlePayClient = new google.payments.api.PaymentsClient({
    environment: "TEST",
  });

  googlePayClient.isReadyToPay(googlePayConfiguration).then((response) => {
    if (response.result) {
      creatAndAddButton();
    }
  });
  // .catch((error) => console.error("isReadyToPay error :", error));
}

function creatAndAddButton() {
  const googlePayButton = googlePayClient.createButton({
    // onClick: onGooglePayButtonClicked,
    buttonColor: "white",
    buttonType: "plain",
    onClick: () => {},
  });
  document.getElementById("googlebutton").appendChild(googlePayButton);
}

// function onGooglePayButtonClicked() {
//   const paymentDataRequest = { ...googlePayConfiguration };
//   paymentDataRequest.merchanInfo = {
//     merchantId: "BCR2DN4T6D4N7Q26",
//     merchantName: "UcanClaim",
//     //can aadd here teh rpcie
//   };
//   paymentDataRequest.transactionInfo = {
//     totalPriceStatus: "FINAL",
//     totalPrice: selectedItem.price,
//     currencyCode: "EUR",
//     countryCode: "ES",
//   };

//   googlePayClient
//     .loadPaymentData(paymentDataRequest)
//     .then((paymentData) => processPaymentData(paymentData))
//     .catch((error) => console.error("loadPaymentData error:", error));
// }

// function processPaymentData(paymentData) {
//   fetch(ordersEndpointUrl, {
//     method: "POST",
//     headers: {
//       "Content-Type": "application/json",
//     },
//     body: paymentData,
//   });
// }
