describe('Tests', function () {
    beforeEach(() => {
        cy.visit('localhost');
    });

    // Ensure page loads properly
    it ('Page loads', function() {
        cy.get('#logo').should('be.visible');
        cy.get('#home').should('be.visible');
        cy.get('#register').should('be.visible');
        cy.get('#all_reviews').should('be.visible');
        cy.get('#login').should('be.visible');
    });

    // Ensure navigation bar links work
    it ('Navigation bar links', function() {
        cy.get('#home').click();
        cy.url().should('include', '/home');
        cy.get('#register').click();
        cy.url().should('include', '/register');
        cy.get('#all_reviews').click();
        cy.url().should('include', '/review');
        cy.get('#login').click();
        cy.url().should('include', '/login');
    });

    // Create a new user
    // it ('Create a new user', function() {
    //     cy.get('#register').click();

    //     const uuid = () => Cypress._.random(0, 1e6)
    //     const id = uuid()
    //     const email = `${id}@test.net`

    //     cy.get('#first_name').type('Test');
    //     cy.get('#last_name').type('User');
    //     cy.get('#email').type(email);
    //     cy.get('#pass1').type('password');
    //     cy.get('#pass2').type('password');
    //     cy.get('#card_no').type('1234567890123456');
    //     cy.get('#exp_m').type('12');
    //     cy.get('#exp_y').type('20');
    //     cy.get('#cvv').type('123');
    //     cy.get('#premium').click();

    //     cy.get('#register_submit').click();

    //     cy.contains('Registered!');
    // });

    // Test login
    it ('Login as new user', function() {
        cy.get('#login').click();
        cy.get('#email').type('test@user.net');
        cy.get('#pass').type('testuser');
        cy.get('#login_submit').click();

        cy.contains('Logout');
    });
    
    // Ensure user page loads
    it ('User page loads', function() {
        
        // Login
        cy.get('#login').click();
        cy.get('#email').type('test@user.net');
        cy.get('#pass').type('testuser');
        cy.get('#login_submit').click();
        
        cy.get('#user_page').click();
        cy.url().should('include', '/user');
    });

    // Test logout
    it ('Logout', function() {
        // Login
        cy.get('#login').click();
        cy.get('#email').type('test@user.net');
        cy.get('#pass').type('testuser');
        cy.get('#login_submit').click();

        cy.get('#logout').click();
        cy.contains('Login');
    });

    // Test watch film
    it ('Watch film', function() {
        // Login
        cy.get('#login').click();
        cy.get('#email').type('test@user.net');
        cy.get('#pass').type('testuser');
        cy.get('#login_submit').click();

        cy.get('#film-1').click();
        cy.contains('The Social Network');

        cy.get('#btn-stream').click();
        cy.url().should('include', '/stream.php?id=1');
    });

    // Ensure free user cannot watch film
    it ('Free user cannot watch film', function() {
        cy.get('#film-1').click();
        cy.contains('The Social Network');

        cy.get('#btn-stream').click();
        cy.url().should('not.include', '/stream.php?id=1');
    });

    // Test write review
    it ('Write review', function() {
        // Login
        cy.get('#login').click();
        cy.get('#email').type('test@user.net');
        cy.get('#pass').type('testuser');
        cy.get('#login_submit').click();

        cy.get('#all_reviews').click();
        cy.get('#btn-add-review').click();
        
        cy.get('#movie_title').type('The Social Network');
        cy.get('#rate-5').click();
        cy.get('#message').type('This is a test review');
        cy.get('#btn-post-review').click();
        
        cy.get('#email').type('test@user.net');
        cy.get('#pass').type('testuser');
        cy.get('#login_submit').click();

        cy.get('#all_reviews').click();
        cy.contains('The Social Network');
    });
});

