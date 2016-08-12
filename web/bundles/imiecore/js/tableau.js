// A $( document ).ready() block.
jQuery( document ).ready(function() {
    console.log( "ready!" );

    var idRow;
    var div_cliquable=jQuery("tr");
    var panelButton= jQuery("#panelButton");

    // FAIRE DISPARAITRE BOUTONS -- lors d'un click sur autre chose qu'une ligne
    $(document.body).click(function(e) {

        // Si ce n'est pas #ma_div ni un de ses enfants
        if( !jQuery(e.target).is("tr") &&  !jQuery(e.target).is("td") && !jQuery(e.target).is("button"))
        {   
            div_cliquable.removeAttr('id');
            console.log($(this));
            // div_cliquable.fadeOut(); // masque #ma_div en fondu
            jQuery("#supprimer").fadeOut();
            jQuery("#modifier").fadeOut();
            jQuery("#imprimer").fadeOut();
            jQuery("#historique").fadeOut();
            jQuery("#generer").fadeOut();
        }
    });

    // FAIRE APPARAITRE BOUTONS -- lors d'un click sur une ligne
    div_cliquable.click(function () 
    { 
    	var ligne = $(this)
        // variable idRow est egal au contenu de la premiere colonne. Normalement c'est toujours un id
    	idRow=ligne.find("td").eq(0).text();
    	console.log(idRow );
        // Suppression de l'attribut id a toute les lignes frangine
    	ligne.siblings().removeAttr('id');
        // Ajout d'un attribut id "selectRow" a la ligne selectionner
        // !!!!!!!!!!!! en css penser a changer la coouleur de #selectRow !!!!!!!!! 
    	ligne.attr('id', 'selectRow');
        jQuery("#supprimer").fadeIn();
        jQuery("#modifier").fadeIn();
        jQuery("#imprimer").fadeIn();
        jQuery("#historique").fadeIn();
        jQuery("#generer").fadeIn();

    });

    //CLICK BOUTON AJOUTER
    jQuery("#ajouter").click(function(){
        var lien = jQuery("#addLink").attr('href');
        jQuery("#addLink").attr('href', lien+'/add')
    });

    //CLICK BOUTON SUPPRIMER
    jQuery("#supprimer").click(function(){
    	if (!idRow)
        {
    		alert("Veuillez selectionner une ligne")
    	}
    	else
    	{
            var lien = jQuery("#delLink").attr('href');
            jQuery("#delLink").attr('href', lien+'/delete/'+idRow)
    	}
    });

    //CLICK BOUTON MODIFIER
    jQuery("#modifier").click(function(){
        if (!idRow)
        {
            alert("Veuillez selectionner une ligne")
        }
        else
        {
            var lien = jQuery("#editLink").attr('href');
            jQuery("#editLink").attr('href', lien+'/edit/'+idRow)
        }
    });

    

});