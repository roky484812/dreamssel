$(document).ready(function () {
    // Initialize Select2
    $(".tag-management").select2({
        tags: false, // Enable tags
        tokenSeparators: [",", " "], // Allow comma or space to create tags
    });

    attributes = [];
    var inputArrays = {};
    var productDetailsDiv = $(".generated-product-details");

    // Handle input field events
    $("#tagInput").on("keypress", function (event) {
        if (event.which === 13 || event.which === 32 || event.which === 44) {
            // Enter, space, or comma pressed
            event.preventDefault();
            var tagValue = $(this).val().trim();
            var tempValue = tagValue;
            tagValue = capitalizeFirstLetter(tempValue);

            var isTagValid = checkingDuplicateTag(tagValue, attributes);
            if (tagValue !== "" && isTagValid) {
                // Add the tag to the select box
                $(".tag-management")
                    .append(new Option(tagValue, tagValue, true, true))
                    .trigger("change");
                attributes.push(tagValue);
                console.log(attributes);
                // Clear the input field
                $(this).val("");
            } else {
                invalid();
            }
        }
    });

    function capitalizeFirstLetter(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }
    function checkingDuplicateTag(value, arr) {
        isTagValidFlag = true;
        for (var i = 0; i < arr.length; i++) {
            if (arr[i] == value) {
                isTagValidFlag = false;
            }
        }
        if (!isTagValidFlag) {
            return false;
        } else {
            return true;
        }
    }

    // Get the value of the title attribute from the li tags
    function updateAttributes() {
        attributes = [];
        $(".select2-selection__choice").each(function () {
            var tagValueIs = $(this).attr("title");
            if (checkingDuplicateTag(tagValueIs, attributes)) {
                attributes.push(tagValueIs);
            } else {
                var unselectValue = $(this).attr("title");
                $(".tag-management")
                    .val(
                        $(".tag-management")
                            .val()
                            .filter(function (value) {
                                return value !== unselectValue;
                            })
                    )
                    .trigger("change");
                invalid();
            }
        });
        console.log(attributes);
    }

    // Listen for the tag removal event
    $(".tag-management").on("select2:unselecting", function (e) {
        var removedTag = e.params.args.data.text;
        var index = attributes.indexOf(removedTag);
        if (index !== -1) {
            attributes.splice(index, 1);
        }
        console.log(attributes);
    });

    // Listen for initial tag selection
    $(".tag-management").on("select2:select", function (e) {
        updateAttributes();
    });

    // Listen for button click to generate HTML
    $(".generate-attr-value-input").on("click", function () {
        generateHTML();
        
        generateButton();
    });

    $(".generate-full-input").on("click", function () {
        var isValueInputed = atLeastOneInputFilled();
        if (isValueInputed) {
            generateFullInputArrays();
            generateInputField();
        } else {
            invalid();
        }
    });

    $(".back-to-attribute-selection").on("click", function () {
        resetToAttributeSelection();
    });

    // Function to generate HTML based on attributes array
    function generateHTML() {
        var html = "";
        for (var i = 0; i < attributes.length; i++) {
            html += '<div class="mb-0">';
            html += '    <div class="add-category">';
            html +=
                '        <label class="form-label">' +
                attributes[i] +
                "</label>";
            html += "    </div>";
            html +=
                '    <input id="tagInput-attr-value-' +
                (i + 1) +
                '" type="text" name="'+attributes[i]+'[]" class="form-control attribute-value" placeholder="' +
                attributes[i] +
                ' Values with Comma (,)">';

            html += "</div>";
        }
        // Append the generated HTML to a container (e.g., body)
        $(".attr-value-input").append(html);
    }
    function generateButton() {
        if (attributes.length < 1) {
            invalid();
        } else {
            not1();

            $(".generate-full-input").css("display", "block");
            $(".hide-attribute-selection").css("display", "none");
            $(".second-back-attribute").css("display", "block");
            genAttrName();
        }
    }
    function generateInputField() {
        if (inputArrays.length < 1) {
            invalid();
        } else {
            not1();
            $(".attr-value-input").css("display", "none");
            $(".generate-full-input").css("display", "none");
        }
    }

    function resetToAttributeSelection() {
        // Clear the generated HTML content
        $(".attr-value-input").empty();
        $(".generated-product-details").empty();

        // Reset the visibility of relevant sections
        $(".generate-attr-value-input").css("display", "block");
        $(".generate-full-input").css("display", "none");
        $(".attribute-input-wrapper").css("display", "block");
        $(".attr-value-input").css("display", "block");

        inputArrays = {};
    }

    function generateFullInputArrays() {
        $('[id^="tagInput-attr-value-"]').each(function () {
            var inputId = $(this).attr("id");
            var attributeName = inputId.replace("tagInput-attr-value-", "");
            var values = $(this)
                .val()
                .split(",")
                .map(function (value) {
                    return value.trim();
                });

            inputArrays[attributeName] = values;
        });

        console.log("Full Input Arrays:", inputArrays[1]);

        // Clear previous HTML content
        productDetailsDiv.empty();

        // Generate HTML for each combination
        generateHTMLForCombinations(
            inputArrays,
            Object.keys(inputArrays),
            0,
            []
        );
    }

    // Recursive function to generate HTML for all combinations
    function generateHTMLForCombinations(
        inputArrays,
        keys,
        index,
        currentCombination
    ) {
        if (index === keys.length) {
            // All keys have been processed, generate HTML for the current combination
            generateProductDetailsHTML(currentCombination);
            return;
        }

        var currentKey = keys[index];
        var currentArray = inputArrays[currentKey];

        for (var i = 0; i < currentArray.length; i++) {
            var newCombination = currentCombination.slice();
            newCombination.push(currentArray[i]);
            generateHTMLForCombinations(
                inputArrays,
                keys,
                index + 1,
                newCombination
            );
        }
    }

    function atLeastOneInputFilled() {
        var atLeastOneFilled = false;

        // Iterate through input fields with class 'attribute-value'
        $(".attribute-value").each(function () {
            if ($(this).val().trim() !== "") {
                atLeastOneFilled = true;
                return false; // exit the loop if at least one field is filled
            }
        });

        return atLeastOneFilled;
    }

    // Example usage
    if (atLeastOneInputFilled()) {
        console.log(
            'At least one input field with class "attribute-value" is filled.'
        );
    } else {
        console.log('No input field with class "attribute-value" is filled.');
    }

    function genAttrName(){
        attributes.forEach((attribute) => {
            var attr_input = document.createElement('input');
            attr_input.type = 'hidden';
            // attr_input.name = 'attritubes[]';
            attr_input.setAttribute('value', attribute);
            $('#attr_name').append(attr_input);
        });
    }
    var row_index = 0;
    // Function to generate HTML for product details
    function generateProductDetailsHTML(combination) {
        var productDetailsHTML = '<div class="mb-0">';
        productDetailsHTML += '    <div class="add-category">';
        productDetailsHTML +=
            '        <label class="form-label">' + combination + "</label>";
        productDetailsHTML += "    </div>";
        productDetailsHTML += '    <div class="row">';
        productDetailsHTML += '    <div class="col-sm-4">';
        productDetailsHTML +=
            `    <input id="tagInput" name="combination[${row_index}][stock]" type="number" class="form-control mb-1" placeholder="Stock">`;
        productDetailsHTML += "    </div>";
        productDetailsHTML += `    <input type='hidden' name="combination[${row_index}][combination_value]" value='${combination}'>`;

        productDetailsHTML += '    <div class="col-sm-4">';
        productDetailsHTML +=
            `    <input id="tagInput" name="combination[${row_index}][price]" type="number" class="form-control mb-1" placeholder="Regular Price">`;
        productDetailsHTML += "    </div>";
        productDetailsHTML += '    <div class="col-sm-4">';
        productDetailsHTML +=
            `    <input id="tagInput" name="combination[${row_index}][dist_price]" type="number" class="form-control mb-1" placeholder="Distributor Price">`;
        productDetailsHTML += "    </div>";
        productDetailsHTML += "    </div>";

        productDetailsHTML += "</div>";

        // Append the generated HTML to the 'generated-product-details' div
        productDetailsDiv.append(productDetailsHTML);
        row_index++;
        
    }
});
