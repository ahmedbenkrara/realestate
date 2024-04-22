<template>
<div>

    <div class="main" v-if="!show">
        <div class="form">
            <h2>{{lang[0]}}</h2>
                <label for="name">{{lang[1]}} :</label>
                <input type="text" :placeholder="lang[1]" ref="name" id="name" class="input" name="name">
            <button class="register" @click="add()">{{lang[2]}}</button>
        </div>
    </div>

    <div class="main" v-if="show">
        <div class="form">
            <h2>{{lang[6]}}</h2>
                <label for="name">{{lang[1]}} :</label>
                <input type="text" :placeholder="lang[1]" :value="name" ref="ename" id="name" class="input" name="name">
            <div class="fl">
                <button class="login flx" @click="update()" >{{lang[7]}}</button>
                <button class="login flx" @click="cancel()">{{lang[8]}}</button>
            </div>
        </div>
    </div>

    <div class="container container1">
        <div class="table-responsive">
            <table class="table">
                <thead id="thead">
                    <tr>
                        <th id="th">#</th>
                        <th id="th">{{lang[1]}}</th>
                        <th id="th" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <tr v-for="(feat,index) in data.data" :key="feat.id">
                        <td id="th">{{index+1}}</td>
                        <td>{{feat.name}}</td>
                        <td>
                            <i class="fa far fa-edit delete" @click="edit(feat.name)" style="background:#00aeef;"></i>
                        </td>
                        <td>
                            <i class="fa fa-trash delete" @click="deletet(feat.id)"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
            <Pagination :data="data" @pagination-change-page="getResults"/>
        </div>
    </div>
</div>
</template>

<script>
import LaravelVuePagination from 'laravel-vue-pagination';
    export default {
        props: ['lang'],
        data(){
            return{
                data:[],
                name:'',
                show:false
            }
        },
        mounted() {
            this.getResults()
        },
        components: {
            'Pagination':LaravelVuePagination
        },
        methods:{
            add(){
                if(this.$refs.name.value.length < 3){
                    $('#name').css('border','2px solid red')
                    return
                }else{
                    $('#name').css('border','2px solid #e5e7eb')
                }

                var form = new FormData()
                form.append('name',this.$refs.name.value)
                axios.post('/api/feature/insert',form).then(res =>{    
                    if(res.data != "0"){
                        this.$refs.name.value = ''
                        this.getResults()
                        alert(`${this.lang[3]}`) 
                    }else{
                        alert(`${this.lang[4]}`)
                    }
                })
            },
            deletet(id){
                if(confirm(`${this.lang[5]}`)){    
                    axios.post('/api/feature/delete/'+id).then(res => {
                        this.getResults()
                    })
                }
            },
            getResults(page = 1){
                axios.get('/api/feature/getall?page='+page).then(res=>{
                    this.data = res.data    
                })
            },
            edit(name){
                this.name = name
                this.show = true
                window.scrollTo(0, 0)
            },
            cancel(){
                this.show = false
            },
            update(){
                if(this.$refs.ename.value.length < 3){
                    $('#name').css('border','2px solid red')
                    return
                }else{
                    $('#name').css('border','2px solid #e5e7eb')
                }
                var form = new FormData()
                form.append('oname',this.name)
                form.append('nname',this.$refs.ename.value)
                axios.post('/api/feature/edit',form).then(res => {
                    if(res.data != "0"){
                        this.$refs.ename.value = ''
                        this.getResults()
                        this.show = false
                        alert(`${this.lang[9]}`)
                    }else{
                        alert(`${this.lang[4]}`)
                    }
                })
            }
        }
    }
</script>