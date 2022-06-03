/// <reference types="cypress" />


describe('Editar Perfil', () => {
    beforeEach(() => {

        cy.visit('http://172.17.61.4/')
        cy.get(':nth-child(10) > .menu').click()
        cy.wait(2000)
        cy.get('#username').type('test')
        cy.get('#password').type('12345')
        cy.get('#iniciar').click()
        cy.wait(2000)
    })



    it('Iniciar sesión y editar perfil', () => {

        //Iniciamos sesión y nos vamos al apartado de cuenta y ver que todo aparece como debería
        cy.get('#dropdownMenuButton1').click()
        cy.get(':nth-child(1) > .dropdown-item').click()
        cy.get('.text-right').should('contain', 'Datos de Perfil')
        cy.get('.d-flex > .btn').should("be.visible")
        cy.get('.d-flex > .btn').click()


        //Entramos a editar perfil y editamos
        cy.get(':nth-child(6) > .btn').click()
        cy.get('.mt-2 > :nth-child(1) > .form-control').clear().type('Prueba')
        cy.get(':nth-child(2) > .form-control').clear().type('Zeus Gym')
        cy.get(':nth-child(3) > .form-control').clear().type('Calle Monlau, 20')
        cy.get(':nth-child(3) > .form-control').clear().type('Francia')
        cy.get(':nth-child(8) > .btn').click()
        cy.wait(5000)

        //Comprobamos que los datos se han guardado correctamente y volvemos a dejarlo como estaba
        cy.get(':nth-child(6) > .btn').click()
        cy.get('.mt-2 > :nth-child(1) > .form-control').clear().type('test')
        cy.get(':nth-child(2) > .form-control').clear().type('test')
        cy.get(':nth-child(3) > .form-control').clear().type('Direccion')
        cy.get(':nth-child(3) > .form-control').clear().type('España')
        cy.get(':nth-child(8) > .btn').click()



    })



});