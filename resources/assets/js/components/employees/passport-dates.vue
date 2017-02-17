<template>
    <datepicker
            :format="format"
            :input-class="css"
            :name="inputName"
            :id="inputId"
            :value="inputValue"
            :monday-first="mondayFirst"
            :disabled="disabled"
            :placeholder="inputPlaceholder"
            :required="true"
    >
    </datepicker>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';

    export default {
        props: ['inputName', 'inputValue', 'inputId', 'inputPlaceholder'],

        components: {
            Datepicker
        },

        data() {
            return {
                format: 'yyyy-MM-dd',
                css: 'datepicker form-control',
                disabled: {
                    from: null,
                    to: null
                },
                mondayFirst: true
            }
        },

        mounted() {
            if (this.inputName === 'passport[issue_date]') {
                this.disabled.from = new Date();
            } else {
                this.disabled.to = new Date();
            }

            $('div.datepicker > input.datepicker').css('background-color', 'inherit');
            $('div.datepicker > input.datepicker').prop('required', 'required');
        }
    }
</script>
