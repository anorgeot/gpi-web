// A $( document ).ready() block.
jQuery( document ).ready(function() {
    console.log( "ready!" );

    var idRow;
    div_cliquable=jQuery("tr");

    $(document.body).click(function(e) {


    // Si ce n'est pas #ma_div ni un de ses enfants
        if( !jQuery(e.target).is("tr") &&  !jQuery(e.target).is("td"))
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

    div_cliquable.click(function () { //lors d'un click sur une ligne
    	var ligne = $(this)
        // variable idRow est egal au contenu de la premiere colonne. Normalement c'est toujours un id
    	idRow = ligne.find( "td").eq(0).text();
    	console.log( idRow );
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

    //Boutton supprimer
    jQuery("#supprimer").click(function(){
    	if (!$idRow)
        {
            
    		alert("Veuillez selectionner une ligne")
    	}
    	else
    	{
    		$(this).attr('value', $idRow);
    		console.log($(this))
    		// alert("are you sure");
    	}
    });

    //Boutton ajouter
    jQuery("#ajouter").click(function(){
        if (!$idRow)
        {
            alert("Veuillez selectionner une ligne")
        }
        else
        {
            $(this).attr('value', $idRow);
            console.log($(this))
            // alert("are you sure");
        }
    });

    //Boutton modifier
    jQuery("#modifier").click(function(){
        if (!$idRow)
        {
            alert("Veuillez selectionner une ligne")
        }
        else
        {
            $(this).attr('value', $idRow);
            console.log($(this))
            // alert("are you sure");
        }
    });

    //Boutton imprimer
    jQuery("#imprimer").click(function(){
        if (!$idRow)
        {
            alert("Veuillez selectionner une ligne")
        }
        else
        {
            $(this).attr('value', $idRow);
            console.log($(this))
            // alert("are you sure");
        }
    });

    //Boutton historique
    jQuery("#historique").click(function(){
        if (!$idRow)
        {
            alert("Veuillez selectionner une ligne")
        }
        else
        {
            $(this).attr('value', $idRow);
            console.log($(this))
            // alert("are you sure");
        }
    });

    //Boutton generer
    jQuery("#generer").click(function(){
        if (!$idRow)
        {
            alert("Veuillez selectionner une ligne")
        }
        else
        {
            $(this).attr('value', $idRow);
            console.log($(this))
            // alert("are you sure");
        }
    });
});