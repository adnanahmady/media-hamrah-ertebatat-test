<template>
    <div
        class="alert flash"
        :class="alertType"
        role="alert"
        v-if="show"
        v-text="message">
    </div>
</template>

<script>
    export default {
        name: "Flash",

        data() {
            return {
                message: '',
                level: 'danger',
                show: false,
                showTime: undefined
            }
        },

        created() {
            window.events.$on('flash', ({level, message}) => {
                this.flash(level, message);
            });

            if (this.message) {
                this.flash(this.level, this.message);
            }
        },

        computed: {
            alertType() {
                return 'alert-' + (this.level ? this.level : 'danger');
            }
        },

        methods: {
            flash(level, message) {
                this.level = level;
                this.message = message;
                this.show = true;

                this.showTime = setTimeout(() => this.show = false, 3000);
            }
        }
    }
</script>

<style scoped>
    .flash {
        position: fixed;
        bottom: 1rem;
        right: 1rem;
    }
</style>
