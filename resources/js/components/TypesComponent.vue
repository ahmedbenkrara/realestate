<template>
<div>
    <div class="main">
        <div class="form" v-if="!show">
            <h2>{{lang[0]}}</h2>
                <label for="name">{{lang[1]}} :</label>
                <input type="text" :placeholder="lang[1]" ref="name" id="name" class="input" name="name">
                <label>{{lang[2]}} :</label>
                <label for="cover" class="plus">
                    <i class="fa fa-plus" id="err"></i>
                </label>
                <input type="file" @change="image()" ref="cover" id="cover" name="cover" accept="image/*">
            <button class="register" @click="add()">{{lang[3]}}</button>
        </div>
    </div>

    <div class="main" v-if="show">
        <div class="form">
            <h2>{{lang[8]}}</h2>
                <label for="name">{{lang[1]}} :</label>
                <input type="text" :placeholder="lang[1]" ref="name" :value="name" id="name" class="input" name="name">
                <label>{{lang[2]}} :</label>
                <label for="cover" class="plus">
                    <i class="fa fa-plus" id="err"></i>
                </label>
                <input type="file" @change="image()" ref="cover" id="cover" name="cover" accept="image/*">
                <div>
                    <img :src="img" alt="" class="eimg">
                </div>
                <div class="fl">
                    <button class="login flx" @click="update()" >{{lang[6]}}</button>
                    <button class="login flx" @click="cancel()">{{lang[7]}}</button>
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
                        <th id="th">{{lang[2]}}</th>
                        <th id="th" colspan="2">Action</th>
                        <th id="th"></th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <tr v-for="(type,index) in data.data" :key="type.id">
                        <td id="th">{{index+1}}</td>
                        <td>{{type.name}}</td>
                        <td><img :src="path+'/'+type.cover" alt=""></td>
                        <td>
                            <i class="fa far fa-edit delete" @click="edit(type.id,type.name,path+'/'+type.cover)" style="background:#00aeef;"></i>
                        </td>
                        <td>
                            <i class="fa fa-trash delete" @click="deletet(type.id)"></i>
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
                path:location.protocol+'//'+window.location.host,
                data:[],
                show: false,
                name:'',
                img:'',
                id:0
            }
        },
        mounted() {
            this.getResults()
        },
        components: {
            'Pagination':LaravelVuePagination
        },
        methods:{
            image(){
                var file = this.$refs.cover.files[0]
                if(Math.round((file.size / 1024)) >= 4096){
                    alert(`${this.lang[4]}`)
                    this.$refs.cover.files = new DataTransfer().files 
                    $('#err').css({'border':'3px solid red','color':'red'})
                }else{
                    alert(`${this.lang[5]}`) 
                    $('#err').css({'border':'3px solid #00427d','color':'#00427d'})
                }
                
            },
            add(){
                if(this.$refs.name.value.length < 3){
                    $('#name').css('border','2px solid red')
                    return
                }else{
                    $('#name').css('border','2px solid #e5e7eb')
                }

                if(this.$refs.cover.files[0] == null){
                    $('#err').css({'border':'3px solid red','color':'red'})
                    return
                }else{
                    $('#err').css({'border':'3px solid #00427d','color':'#00427d'})
                }
                var form = new FormData()
                form.append('name',this.$refs.name.value)
                form.append('cover',this.$refs.cover.files[0])
                axios.post('/api/type/insert',form).then(res =>{
                    if(res.data != "0"){
                        this.getResults()
                        this.$refs.cover.files = new DataTransfer().files 
                        this.$refs.name.value = ''  
                        alert(`${this.lang[12]}`)
                    }else{
                        alert(`${this.lang[10]}`) 
                    }
                })
            },
            deletet(id){
                if(confirm(`${this.lang['9']}`)){
                    axios.post('/api/type/delete/'+id).then(res => {
                        this.getResults()
                    })
                }
            },
            cancel(){
                this.show = false
            },
            edit(id,name,img){
                this.id = id
                this.name = name
                this.img = img
                this.show = true
                scrollTo(0,0)
            },
            update(){
                if(this.$refs.name.value.length < 3){
                    $('#name').css('border','2px solid red')
                    return
                }else{
                    $('#name').css('border','2px solid #e5e7eb')
                }

                var form = new FormData()
                form.append('name',this.$refs.name.value)
                form.append('old',this.$refs.name.value)
                form.append('id',this.id)
                if(this.$refs.cover.files[0] != null){
                    form.append('cover',this.$refs.cover.files[0])
                }
                axios.post('/api/type/edit',form).then(res =>{  
                    if(res.data != "0"){
                        this.$refs.name.value = ''
                        this.$refs.cover.files = new DataTransfer().files 
                        this.getResults()
                        this.show = false
                        alert(`${this.lang[11]}`)
                    }else{
                        alert(`${this.lang[10]}`)
                    }
                })      
            },getResults(page = 1){
                axios.get('/api/type/getall?page='+page).then(res=>{
                    this.data = res.data
                })
            }
        }
    }
</script>
