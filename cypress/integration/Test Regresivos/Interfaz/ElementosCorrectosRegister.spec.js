/// <reference types="cypress" />


describe('Elementos Correctos Login', () => {
    beforeEach(() => {

        cy.visit('http://localhost/AplicacionGimnasio/Views/index.php')
        cy.get(':nth-child(9) > .menu').click()
    })


    it('Elementos Correctos Login', () => {

        cy.get('img').should('be.visible')
        cy.get('#nombre').should('be.visible')
        cy.get('#apellidos').should('be.visible')
        cy.get('.container').should('be.visible')
        cy.get('#username').should('be.visible')
        cy.get('#Correo').should('be.visible')
        cy.get('#num_tlf').should('be.visible')
        cy.get('#fecha').should('be.visible')
        cy.get('#confirm_password').should('be.visible')
        cy.get('#password').should('be.visible')
        cy.get('[style="color: yellow"][href="LoginView.php"]').should('be.visible')
        cy.get('[href="index.php"]').should('be.visible')


        //registrarse mal

        cy.get('#nombre').type('Prueba')
        cy.get('#apellidos').type('Prueba')
        cy.get('#username').type('admin')
        cy.get('#Correo').type('prueba@prueba.com')
        cy.get('#num_tlf').type('680195669')
        cy.get('#fecha').type('2000-08-10')
        cy.get('#confirm_password').type('12345')
        cy.get('#password').type('12345')
        cy.get('.btn').click()
        cy.wait(2000)

        //Iniciar sesión correctamente
        cy.reload()
        cy.get('#nombre').type('Prueba')
        cy.get('#apellidos').type('Prueba')
        cy.get('#username').type('Prueba')
        cy.get('#Correo').type('prueba@prueba.com')
        cy.get('#num_tlf').type('680195669')
        cy.get('#fecha').type('2000-08-10')
        cy.get('#confirm_password').type('12345')
        cy.get('#password').type('12345')
        cy.get('.btn').click()
        cy.get('#dropdownMenuButton1').should('be.visible')

        //Eliminar User
        cy.get('#dropdownMenuButton1').click()
        cy.get(':nth-child(1) > .dropdown-item').click()
        cy.get(':nth-child(6) > .btn').click()
        cy.get('.col-md-1 > .p-3 > .mt-5 > .btn').click()
        cy.get('#logo').should('be.visible')


    })


});