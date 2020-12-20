<template>
    <div class="center">
        <h1 class="header">Pompa Air</h1>
        <RockerSwitch :size="2" @change="turnIt()" />
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Height</th>
                    <th scope="col">Radius</th>
                    <th scope="col">Volume</th>
                    <th scope="col">Status</th>
                    <th scope="col">Status Engine</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr v-if="allData">
                        <td>{{allData.id}}</td>
                        <td>{{allData.height}}</td>
                        <td>{{allData.radius}}</td>
                        <td>{{allData.volume}}</td>
                        <td>{{allData.status}}</td>
                        <td>{{allData.turn_on}}</td>
                        <td>{{allData.created_at}}</td>
                        <td>{{allData.updated_at}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import Switches from 'vue-switches';
import RockerSwitch from "vue-rocker-switch";
import 'vue-toast-notification/dist/theme-default.css';
import "vue-rocker-switch/dist/vue-rocker-switch.css";
import api from '../api';
export default {
    
    data(){
        return{
            turn_on:false,
            allData:[],
        }
    },
    components: {
        RockerSwitch
    },
    async created(){
        this.onLoad();
    },
    mounted: function () {
        window.setInterval(() => {
            this.onLoad();
            console.log("Loading data");
        }, 3000);
    },
    methods:{
        async onLoad(){
            let uri = `/api/volume/last`;
            await api.get(uri).then((response) => {
                this.allData = response.data.result;
            });
        },
        async turnIt(){
            let uri = `/api/volume/turn`;

            let turn = !this.turn_on;

            let data = Object.assign({turn_on:turn});
            api.post(uri,data).then((response) => {
                    this.$swal(
                        'Added!',
                        'Engine is Updated',
                        'success'
                        );
                         this.onLoad();
                });
        }
    },

}
</script>

<style>

.header{

    font-size:80px

}

.center{
    margin: auto;

    text-align:center;
}

</style>


