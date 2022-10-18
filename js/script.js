console.log('JS OK!');

const app = new Vue({
    el: '#app',
    data() {
        return {
            albums: [],
            filter: '',
        };
    },

    mounted() {
        this.getAlbums('');
    },

    methods: {
        getAlbums(genre) {
            axios.get('/Lezioni-back-end-PHP-MAMP/Lezioni/Lezione-4-17102022/Esercitazione-4/php-ajax-dischi/api/albums.php?filter=' + genre)
                .then(response => {
                    if (response.status === 200) {
                        this.albums = response.data;
                    }
                })
                .catch(e => console.log(e));
        }
    }
})