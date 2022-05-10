/// <reference types="cypress" />


describe('example to-do app', () => {
    beforeEach(() => {

        cy.visit('http://localhost/AplicacionGimnasio/Views/index.php')
        cy.wait(2000)
    })

    it('Iniciar sesión', () => {

        cy.get(':nth-child(10) > .menu').click()
        cy.wait(2000)
        cy.get('#username').type('admin')
        cy.get('#password').type('admin')
        cy.get('#iniciar').click()
            //cy.get(':nth-child(3) > .dropdown-item').should('be.visible')
        cy.wait(2000)
        cy.get('#dropdownMenuButton1').click()
        cy.get(':nth-child(3) > .dropdown-item').click()
        cy.wait(3000)

    })



});