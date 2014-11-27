# Freelance Bil

## About
A small service that let's you create products ie. "ABCompany new adaptive website", which you can share a link and password to the payment form for the client whom then can make sure it's the correct task, fill in card details and get a reciept.

## TODO
- Keep administration simple! √
- Add CRUD for Customers √
    + Email
    + Name
- Add CRUD for Products √
    + Name
    + Price
    + Customer
    + Password
    + Description
- Detailed list of customers and products √
- Password protected products √
- Stripe billing √
    + (It should be possible to write new implementations easily) √
- Get reciept on billing success √
- Make sure all routes are secure
    + CSRF protection
    + Route permission/access vulnerability
    + Excape all input

## CAN-DO
- Write braintree payment implementation
- "Save credit card" feature
    Requires:
    + Customer signup
        * Name
        * Email
        * Password
        * Confirm
- "Non-programmer installation prompt like a CMS"

Like almost every other project, feel free to submit pull, bug and feature requests, since we're all different we might have different needs (logic).
Please don't get hurt if I turn down your request, either it's because I'm mean and don't see it fitting the project, or else it's really good, but I would like to implement it in another way. I'm the maintainer after all. :)

You're awesome!
**- Jakob Steinn**
