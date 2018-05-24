<template>
  <div>

    <div v-resize="onResize" >
      <v-card-title>

        <v-spacer></v-spacer>
        <v-text-field
          v-model="search"
          append-icon="search"
          label="Search"
          single-line
          hide-details
        ></v-text-field>
      </v-card-title>
      <v-data-table v-if="windowSize"
                    :headers="headers"
                    :items="items"
                    :rows-per-page-items="[10]"
                    :search="search"
                    hide-actions
                    class="elevation-1"
                    :pagination.sync="pagination"
                    hide-actions
      >
        <template slot="items" slot-scope="props">
          <td v-for="head in headers" class="text-xs-right"  >


            <a  v-bind:href=" props.item[head.link]"  target = "_blank">{{ props.item[head.value] }}</a>

          </td>
        </template>
        <v-alert slot="no-results" :value="true" color="error" icon="warning">
          Your search for "{{ search }}" found no results.
        </v-alert>
      </v-data-table>

      <div class="text-xs-center pt-2">
        <v-pagination v-model="pagination.page" :length="pages"></v-pagination>
      </div>
      <div v-if="windowSize === false"
           hide-actions
           v-for="item in items"
      >
        <v-flex xs12 sm6 offset-sm3 class="marginS">
          <v-card>
            <v-card-title class="red darken-2 white--text" height="200px">
              <span class="headline">{{ item.ref}}</span>
            </v-card-title>

            <v-card-title>
              <table>

                <tbody>
                <tr v-for="head in headers" v-if="head.value !== 'ref' &&  parseInt(item[head.value]) > 0" >

                  <td  class="grey--text">{{ replaceText(replaceText(head.value,'_url_',' '),'_',' ') }} : </td>
                  <td><a v-bind:href="item[head.link]">{{ item[head.value]}}</a></td>

                </tr>
                </tbody>
              </table>
            </v-card-title>
          </v-card>
        </v-flex>

      </div>
    </div>



  </div>
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
  .marginS{
    padding-top: 10px;
    padding-bottom: 10px;
  }
  .elementProduct{
    display: block;
    width: 100%;
  }
</style>
<script>
  export default {
    data () {
      return {
        search: '',
        pagination: {},
        headers: [
          {
            text: 'ref',
            link: '',
            value: 'ref'
          }
        ],
        items:[],
        windowSize: true
      }
    },

    methods : {
      async mamethode() {
        let response = await fetch('http://tracker.local/');
        let data = await response.json();
        //this.mapData(data);
        //this.items = [data.catalogue];
        this.items = data;
        const responze = await fetch('http://tracker.local/index.php/Welcome/deux');
        const dataz = await responze.json();
        this.headers=this.headers.concat(dataz);

      },
      replaceText(value,key,replace){
        return value.replace(key,replace)
      },
      onResize () {
        if(window.innerWidth < 1430){
          this.windowSize = false

        }else {
          this.windowSize = true

        }

      }

    },
    mounted() {
      this.mamethode(),
        this.onResize()


    },
    computed: {
      pages () {
        if (this.pagination.rowsPerPage == null ||
          this.pagination.totalItems == null
        ) return 0

        return Math.ceil(this.pagination.totalItems / this.pagination.rowsPerPage)
      }
    }
  }
</script>
