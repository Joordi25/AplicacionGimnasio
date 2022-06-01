/// <reference types="cypress" />


describe('Comprobar Funcionalidades Admin', () => {
    beforeEach(() => {

        cy.visit('http://172.17.61.4/')
        cy.get(':nth-child(10) > .menu').click()
        cy.wait(2000)
        cy.get('#username').type('admin')
        cy.get('#password').type('admin')
        cy.get('#iniciar').click()
        cy.wait(2000)
    })



    it('Comprobar Funcionalidades', () => {
        cy.get('#dropdownMenuButton1').click()
        cy.get('[href="../src/php/cesta/inicio_admin.php"]').should('be.visible')
        cy.get('#dropdownMenuButton1').should('be.visible')

    })



});