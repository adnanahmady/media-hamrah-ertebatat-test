<template>
    <div class="row">
        <div class="col-10 offset-1 table-responsive">
            <table class="table table-striped table-dark table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">symbol</th>
                    <th scope="col">slug</th>
                    <th scope="col">last updated</th>
                    <th scope="col">date added</th>
                    <th scope="col">num market pairs</th>
                    <th scope="col">tags</th>
                    <th scope="col">max supply</th>
                    <th scope="col">circulating supply</th>
                    <th scope="col">total supply</th>
                    <th scope="col">platform</th>
                    <th scope="col">cmc rank</th>
                    <th scope="col">quote</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in data">
                    <td v-text="item.name"></td>
                    <td v-text="item.symbol"></td>
                    <td v-text="item.slug"></td>
                    <td v-text="item.last_updated"></td>
                    <td v-text="item.date_added"></td>
                    <td v-text="item.num_market_pairs"></td>
                    <td v-text="item.tags"></td>
                    <td v-text="item.max_supply"></td>
                    <td v-text="item.circulating_supply"></td>
                    <td v-text="item.total_supply"></td>
                    <td v-text="item.platform"></td>
                    <td v-text="item.cmc_rank"></td>
                    <td v-text="item.quote"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            data: {
                type: Array,
                require: true
            }
        }
    }
</script>
