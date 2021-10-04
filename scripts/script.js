const email = document.getElementById('email')
const terms = document.getElementById('terms')
const form = document.getElementById('form')
const errorElement = document.getElementById('error')

function validateEmail(email_test) {
  const re = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  return (re.test(email_test));
}
function validateColombiaEmail(email_test) {
  const re = /^[^ ]+@[^ ]+\.+co$/;
  return (re.test(email_test))
}

form.addEventListener('submit', (e) => {
  let messages = []
  if (email.value === '' || email.value === null) {
    messages.push('Email adress is required')
  } else if (!(validateEmail(email.value))) {
    messages.push('Please provide a valid e-mail address')
  } else if (validateColombiaEmail(email.value)) {
    messages.push('We are not accepting subscriptions from Colombia emails')
  }

  if (!(terms.checked)) {
    messages.push('You must accept the terms and conditions')
  }

  if (messages.length > 0) {
    e.preventDefault()
    errorElement.innerText = messages.join(', ')
  }
})