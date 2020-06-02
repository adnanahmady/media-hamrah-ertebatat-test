<template>
    <div class="row mb-3">
        <div class="col-10 offset-1">
            <div class="card badge-light">
                <div class="card-header">
                    <strong>EXChange you'r coins</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="amount">amount</label>

                                <input
                                    type="text"
                                    id="amount"
                                    @keydown.enter="convert"
                                    v-model="amount"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="date">date</label>

                                <datetime
                                    v-model="date"
                                    id="date"
                                    type="datetime"
                                    input-class="form-control"></datetime>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label for="from">from:</label>

                            <v-select
                                v-if="coins"
                                label="name"
                                v-model="symbol"
                                :options="coins"
                                id="from"></v-select>
                        </div>
                        <div class="col-6">
                            <label for="symbol">convert to:</label>

                            <v-select
                                v-if="coins"
                                label="name"
                                v-model="convertCase"
                                id="symbol"
                                :options="coins"></v-select>
                        </div>
                    </div>
                    <div class="row" v-if="price">
                        <div class="col">
                            <div v-text="price" class="alert alert-success"></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary" type="button" @click="convert">
                                <i class="fa fa-balance-scale" aria-hidden="true"></i>
                                <span class="ml-2">submit</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import vSelect from 'vue-select';
    import { DateTime } from 'vue-datetime';

    export default {
        name: "ConvertApp",

        components: { vSelect, DateTime },

        data() {
            return {
                coins: undefined,
                amount: 0,
                symbol: undefined,
                convertCase: undefined,
                date: '',
                price: 0
            }
        },

        async created() {
            this.coins = await this.getCoins();
        },

        computed: {
            dataIsValid() {
                return !this.symbol || !this.convertCase || !this.amount;
            },

            symbolsSelected() {
                return this.symbol.symbol && this.convertCase.symbol;
            }
        },

        methods: {
            async getCoins() {
                try {
                    const { data } = await axios.get('/api/coins');

                    return data;
                } catch (ex) {
                    window.flash(ex.message);
                }
            },
            async convert() {
                if (this.dataIsValid) return window.flash('please fill all fields');

                try {
                    const {data: {data: {price}}} = await axios.post(
                        '/api/converts',
                        {
                            amount: this.amount,
                            symbol: this.symbol.symbol,
                            convert: this.convertCase.symbol,
                            date: this.date
                        }
                    );

                    this.price = price;
                } catch (ex) {
                    if (ex.response && ex.response.data) {
                        const keys = Object.keys(ex.response.data.errors);
                        window.flash(ex.response.data.errors[keys[0]].shift());
                    }
                }
            }
        }
    }
</script>

<style scoped>
    @import "~vue-select/dist/vue-select.css";
    @import "~vue-datetime/dist/vue-datetime.css";
</style>
