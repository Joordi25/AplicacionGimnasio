/// <reference types="cypress" />


describe('Iniciar Sesión en la web', () => {
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
        cy.get('#dropdownMenuButton1').click()
        cy.get('[href="../src/php/cesta/inicio_admin.php"]').click()
        cy.wait(2000)

        //Añadir producto y eliminar
        cy.get('nav > :nth-child(2) > a').click()
        cy.get('#name').type('prueba')
        cy.get('#price').type('200')
        const filepath = '/images/icon.png'
        cy.get('[type="file"]').attachFile(filepath)
        cy.get('#iniciar').click()
        cy.get('.productos > .product_footer > :nth-child(1) > .btn').last().click()


    })



});