/// <reference types="cypress" />


describe('Iniciar Sesión en la web', () => {
    beforeEach(() => {

        cy.visit('http://172.17.61.4/')
        cy.wait(2000)
    })

    it('Iniciar sesión', () => {

        cy.get(':nth-child(10) > .menu').click()
        cy.wait(2000)
        cy.get('#username').type('test')
        cy.get('#password').type('12345')
        cy.get('#iniciar').click()
            //cy.get(':nth-child(3) > .dropdown-item').should('be.visible')
        cy.wait(2000)
        cy.get('#dropdownMenuButton1').click()
        cy.get(':nth-child(3) > .dropdown-item').click()
        cy.wait(3000)

    })



});