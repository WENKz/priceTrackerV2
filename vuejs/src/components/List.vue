<template>
  <v-container fluid>
    <v-slide-y-transition mode="out-in">
      <v-layout column align-center>
        <v-card>
          <v-data-table
                  :headers="headers"
                  :items="items"
                  hide-actions
                  class="elevation-1"
          >
            <template slot="items" slot-scope="props">
              <td v-for="head in headers" class="text-xs-right"  >

<span v-if="props.item[head.link].indexOf('http') != -1">
                  <a  v-bind:href=" props.item[head.link]"  target = "_blank">{{ props.item[head.link] }}{{props.item[head.link].indexOf('http')}}</a>

</span>
                <span v-else>
                  <a  v-bind:href=" props.item[head.link]"  target = "_blank">{{ props.item[head.value] }}</a>

</span>

              </td>
            </template>
          </v-data-table>
        </v-card>

      </v-layout>
    </v-slide-y-transition>
  </v-container>
</template>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  h1, h2 {
    font-weight: normal;
  }
  ul {
    list-style-type: none;
    padding: 0;
  }
  li {
    display: inline-block;
    margin: 0 10px;
  }
  a {
    color: #42b983;
  }
</style>
<script>
    export default {
        data () {
            return {
                search: '',
                headers: [
                    {
                        text: 'ref',
                        link: '',
                        value: 'ref'
                    }
                ],
                items:[]
            }
        },
        methods : {
            async mamethode() {
        let response = await fetch('http://tracker.local/');
        let data = await response.json();
        //this.mapData(data);
        //this.items = [data.catalogue];
        this.items = data;
        let responze = await fetch('http://tracker.local/index.php/Welcome/deux');
        let dataz = await responze.json();
        this.headers=this.headers.concat(dataz);

        console.log(this.headers)
    }
    },
    mounted() {
        this.mamethode().then(res => {
        })

    }
    }
</script>
