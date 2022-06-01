/// <reference types="cypress" />

Cypress._.times(100, (k) => {
    describe('Prueba de estres', () => {
        beforeEach(() => {

            cy.visit('http://172.17.61.4/')
            cy.get(':nth-child(10) > .menu').click()
            cy.get('#username').type('admin')
            cy.get('#password').type('admin')
            cy.get('#iniciar').click()
        })



        it('Ir a la tienda y añadir/eliminar producto', () => {
            cy.get('#dropdownMenuButton1').click()
            cy.get('[href="../src/php/cesta/inicio_admin.php"]').click()


            //Añadir proceso--Repetir 2 veces
            cy.get('nav > :nth-child(2) > a').click()
            cy.get('#name').type('prueba')
            cy.get('#price').type('200')
            const filepath = '/images/icon.png'
            cy.get('[type="file"]').attachFile(filepath)
            cy.get('#iniciar').click()
            cy.get('.productos > .product_footer > :nth-child(1) > .btn').last().click()


            cy.get('nav > :nth-child(2) > a').click()
            cy.get('#name').type('prueba')
            cy.get('#price').type('200')
            const filepath1 = '/images/icon.png'
            cy.get('[type="file"]').attachFile(filepath1)
            cy.get('#iniciar').click()
            cy.get('.productos > .product_footer > :nth-child(1) > .btn').last().click()


        })



    });
})