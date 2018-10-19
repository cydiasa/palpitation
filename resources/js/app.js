
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$( document ).ready(function() {
    // Run input check and output generation for support text
    drinkChoiceOutput()

    // Bind keyup and change to select and input options
    $('#caffeine_source_id, #unitsToDrink').bind("keyup change", function(e) {

        // Run input check and output generation for support text
        drinkChoiceOutput()
    })
});

function drinkChoiceOutput(){

    // Gather variables
    drinkChoice             = $( "#caffeine_source_id :checked").text();
    drinkChoiceValue        = $( "#caffeine_source_id :checked").val();
    drinkChoiceCaffeine     = $( "#caffeine_source_id :checked").attr('caffeine') ;
    drinkChoiceDescription  = $( "#caffeine_source_id :checked").attr('caffeineDescription') ;
    unitsToDrink            = $( "#unitsToDrink").val();
    overdoseWarning         = $('.outputOverdoseWarning');
    total                   = (unitsToDrink * drinkChoiceCaffeine);

    // If drink choice is set
    if(drinkChoiceValue != ""){
        $('#outputDrinkInformation').html('<div class="alert alert-' + returnAlertColorBasedOnCaffeine(drinkChoiceCaffeine) + '" role="alert">You have Selected ' + drinkChoice + '. It contains ' + drinkChoiceCaffeine + ' Milligrams of Caffeine</div><p>' + drinkChoiceDescription + '</p>');
    }

    // If drinks unit is set
    if(unitsToDrink > 0 && drinkChoiceValue != ""){
        $('#outputTotalCaffeineOutput').html('<div class="alert alert-' + returnAlertColorBasedOnCaffeine(total) + '" role="alert">If you drink (' + unitsToDrink + ') ' + drinkChoice + ' drinks. You would have consumed a total of ' + total  + ' Milligrams of Caffeine in one sitting</div>');
    }

    // Hide or display overdose warning
    (total > 500)?overdoseWarning.show(1200):overdoseWarning.hide(1200);
}

function returnAlertColorBasedOnCaffeine(drinkChoiceCaffeineAmount){
    return (drinkChoiceCaffeineAmount>=200)?
                                        'secondary':
                                        (drinkChoiceCaffeineAmount>=50)?
                                                    'warning':
                                                    'primary';
}
