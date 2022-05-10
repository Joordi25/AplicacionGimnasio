describe('Prueba', () => {
    it('Acceder a la página', () => {
        cy.visit('http://localhost/ecommerce/app/Index.php')
    })

    it('Iniciar Sesión & Comprar', () => {
        cy.get('.btn-success').click()
        cy.get(':nth-child(1) > .form-control').type('admin')
        cy.get(':nth-child(2) > .form-control').type('admin')
        cy.get('#iniciar').click()
        cy.wait(2000)
        cy.get(':nth-child(5) > .nav-link').click()
        cy.get(':nth-child(2) > :nth-child(1) > .panel > .panel-body > .product_footer > .pull-right > .btn').click()
        cy.get(':nth-child(3) > :nth-child(3) > .panel > .panel-body > .product_footer > .pull-right > .btn').click()
        cy.get('li > a').click()
        cy.get('[href="compra/pagar.php"]').click()
        cy.get('.number').type('4567392783867271')
        cy.get('.inputname').type('Test Test')
        cy.get('.expire').type('122023')
        cy.get('.ccv').type('426')

    })


})