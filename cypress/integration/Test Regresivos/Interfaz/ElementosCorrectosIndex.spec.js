/// <reference types="cypress" />


describe('Elementos Correctos Index', () => {
    beforeEach(() => {

        cy.visit('http://172.17.61.4/')
        cy.get(':nth-child(10) > .menu').click()
        cy.wait(2000)
        cy.get('#username').type('admin')
        cy.get('#password').type('admin')
        cy.get('#iniciar').click()
        cy.wait(2000)
    })



    it('Ir a la tienda y ecoger varios productos', () => {
        cy.get('#dropdownMenuButton1').should('be.visible')
        cy.get(':nth-child(3) > .menu').should('be.visible')
        cy.get(':nth-child(4) > .menu').should('be.visible')
        cy.get(':nth-child(5) > .menu').should('be.visible')
        cy.get(':nth-child(6) > .menu').should('be.visible')
        cy.get('.col-md-2 > .menu').should('be.visible')
        cy.get('#logo').should('be.visible')
        cy.get('#boton1').should('be.visible')
        cy.get('#boton2').should('be.visible')
        cy.get('#instalacionesa').should('be.visible')
        cy.get('#instalacionesa').should('be.visible')
        cy.get('#precios1 > #preciosbutton > #precioslink').should('be.visible')
        cy.get('#precioslink2').should('be.visible')
        cy.get(':nth-child(3) > #preciosbutton > #precioslink').should('be.visible')

    })



});