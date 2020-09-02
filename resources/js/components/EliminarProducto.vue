<template>
    <input
        type="submit"
        class="btn btn-danger"
        value="Eliminar"
        @click="eliminarProducto"
    />
</template>

<script>
export default {
    props: ["productoId"],
    mounted() {
    },

    methods: {
        eliminarProducto() {
            this.$swal({
                title: "¿Deseas eliminar este producto?",
                text: "Una vez eliminado, no se puede recuperar!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si",
                cancelButtonText: "No"
            }).then(result => {
                if (result.value) {
                    const params = {
                        id: this.productoId
                    };

                    //enviar la peticion al servidor
                    axios
                        .post(`productos/${this.productoId}`, {
                            params,
                            _method: "delete"
                        })
                        .then(result => {
                            this.$swal({
                                title: "Producto Eliminado",
                                text: "Se eliminó el producto",
                                icon: "success"
                            });

                            //elminar elemento del dom
                            this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                        })
                        .catch(err => {
                            console.log(err);
                        });
                }
            });
        }
    }
};
</script>
