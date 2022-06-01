/// <reference types="cypress" />


describe('Elementos Correctos Login', () => {
    beforeEach(() => {

        cy.visit('http://172.17.61.4/')
        cy.get(':nth-child(10) > .menu').click()
    })


    it('Elementos Correctos Login', () => {

        cy.get('img').should('be.visible')
        cy.get('.container').should('be.visible')
        cy.get('#username').should('be.visible')
        cy.get('#password').should('be.visible')
        cy.get('#iniciar').should('be.visible')
        cy.get('[href="RegisterView.php"]').should('be.visible')
        cy.get('[href="index.php"]').should('be.visible')


        //Iniciar sesión mal

        cy.get('#username').type('admin')
        cy.get('#password').type('admin1')
        cy.get('#iniciar').click()
        cy.wait(2000)

        //Iniciar sesión correctamente
        cy.get('#password').type('admin')
        cy.get('#iniciar').click()
        cy.get('#dropdownMenuButton1').should('be.visible')
    })


});