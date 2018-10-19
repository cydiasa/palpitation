
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$( document ).ready(function() {
    drinkChoiceOutput()
    $('#caffeine_source_id, #unitsToDrink').bind("keyup change", function(e) {
        drinkChoiceOutput()
    })
});

function drinkChoiceOutput(){
    drinkChoice             = $( "#caffeine_source_id :checked").text();
    drinkChoiceValue        = $( "#caffeine_source_id :checked").val();
    drinkChoiceCaffeine     = $( "#caffeine_source_id :checked").attr('caffeine') ;
    drinkChoiceDescription  = $( "#caffeine_source_id :checked").attr('caffeineDescription') ;
    unitsToDrink            = $( "#unitsToDrink").val();
    overdoseWarning         = $('.outputOverdoseWarning');
    total                   = (unitsToDrink * drinkChoiceCaffeine);

    if(drinkChoiceValue != ""){
        $('#outputDrinkInformation').html('<div class="alert alert-' + returnAlertColorBasedOnCaffeine(drinkChoiceCaffeine) + '" role="alert">You have Selected ' + drinkChoice + '. It contains ' + drinkChoiceCaffeine + ' Milligrams of Caffeine</div><p>' + drinkChoiceDescription + '</p>');
    }

    if(unitsToDrink > 0 && drinkChoiceValue != ""){
        $('#outputTotalCaffeineOutput').html('<div class="alert alert-' + returnAlertColorBasedOnCaffeine(total) + '" role="alert">If you drink (' + unitsToDrink + ') ' + drinkChoice + ' drinks. You would have consumed a total of ' + total  + ' Milligrams of Caffeine in one sitting</div>');
    }

    (total > 500)?overdoseWarning.show(1200):overdoseWarning.hide(1200);
}

function returnAlertColorBasedOnCaffeine(drinkChoiceCaffeineAmount){
    return (drinkChoiceCaffeineAmount>=200)
                                        ?'secondary'
                                        :(drinkChoiceCaffeineAmount>=50)
                                            ?'warning'
                                            :'primary';
}
