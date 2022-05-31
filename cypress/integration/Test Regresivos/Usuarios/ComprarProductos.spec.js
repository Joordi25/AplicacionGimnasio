/// <reference types="cypress" />


describe('Iniciar Sesión en la web', () => {
    beforeEach(() => {

        cy.visit('http://172.17.61.4/')
        cy.get(':nth-child(10) > .menu').click()
        cy.wait(2000)
        cy.get('#username').type('test')
        cy.get('#password').type('12345')
        cy.get('#iniciar').click()
        cy.wait(2000)
    })



    it('Ir a la tienda y ecoger varios productos', () => {

        cy.get(':nth-child(5) > .menu').click({ force: true })
        cy.get(':nth-child(1) > :nth-child(1) > .productos > .product_footer > .pull-right > .btn').click()
        cy.get('#dropdownMenuButton1').click()
        cy.get(':nth-child(2) > .dropdown-item').click()
        cy.get('[href="clear_cart.php"]').click()
        cy.wait(2000)
        cy.get(':nth-child(2) > :nth-child(1) > .productos > .product_footer > .pull-right > .btn').click()
        cy.get('#dropdownMenuButton1').click()
        cy.get(':nth-child(2) > .dropdown-item').click()
        cy.get('[href="compra/pagar.php"]').click()
        cy.get('.number').type('5351 2040 2043 1013')
        cy.get('.inputname').type('test test test')
        cy.get('.expire').type('1027')
        cy.get('.ccv').type('927')


    })



});