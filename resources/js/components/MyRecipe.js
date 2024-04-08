import React, { Component } from "react";
import ReactDOM from "react-dom";
import axios from "axios";
import Menu from "./Menu";
import { Box, Image, Button, ChakraProvider } from "@chakra-ui/react";
import { DeleteIcon, EditIcon, StarIcon } from '@chakra-ui/icons'

export default class MyRecipe extends Component {
    constructor() {
        super();
        this.state = {
            recipes: [],
            menu: false,
            action: "",
        };
    }

    loadRecipe() {
        axios
            .get(`/api/recipes/user/${this.props.user_id}`)
            .then((response) => {
                this.setState({
                    recipes: response.data,
                });
            });
    }

    deleteRecipe(recipeId) {
        axios.delete(`/api/recipe/${recipeId}`).then((response) => {
            this.loadRecipe();
        });
    }

    recipeCard(recipe, index) {
        const avg =
            recipe.ratings
                .map((rating) => rating.rating)
                .reduce((a, b) => a + b, 0) / recipe.ratings.length;
        return (
            <Box
                maxW='sm' 
                borderWidth='1px' 
                borderRadius='lg' 
                overflow='hidden'
                key={index}
                style={{
                    margin: "1em 0",
                    opacity: this.state.action === index ? 0.8 : 1.0,
                    position: "relative",
                }}
                onMouseEnter={() => this.setState({ action: index })}
                onMouseLeave={() => this.setState({ action: "" })}
            >
                {this.state.action === index && (
                    <>
                    <div
                        style={{
                            position: "absolute",
                            zIndex: 1000,
                            display: "flex",
                            flexDirection: "column",
                            alignItems: "center",
                            justifyContent: "space-evenly",
                            top: 5,
                            left: 5,
                        }}
                    >
                        <Button>
                            <EditIcon
                                label="Edit"
                                size="big"
                                onClick={() =>
                                    (location.href = `/recipe/edit/${recipe.id}`)
                                }
                            />
                        </Button>
                    </div>
                    <div
                        style={{
                            position: "absolute",
                            zIndex: 1000,
                            display: "flex",
                            flexDirection: "column",
                            alignItems: "center",
                            justifyContent: "space-evenly",
                            top: 5,
                            right: 5,
                        }}
                    >
                        <Button>
                            <DeleteIcon
                                label="Delete"
                                size="big"
                                onClick={() => {
                                    if (
                                        window.confirm(
                                            "Are you sure to delete this recipe?"
                                        )
                                    )
                                        this.deleteRecipe(recipe.id);
                                }}
                            />
                        </Button>
                    </div>
                    </>
                )}
                <Image src={recipe.image} boxSize='350px' objectFit='cover'/>
                <Box p='6'>
                    <Box display='flex' alignItems='baseline'>
                        <Box
                            color='gray.500'
                            fontWeight='semibold'
                            letterSpacing='wide'
                            fontSize='xs'
                            textTransform='uppercase'
                            ml='2'
                        >
                            {recipe.user.name}
                        </Box>
                    </Box>

                    <Box
                        mt='1'
                        fontWeight='semibold'
                        as='h4'
                        lineHeight='tight'
                        isTruncated
                        >
                        {recipe.name}
                    </Box>

                    <Box display='flex' mt='2' alignItems='center'>
                        {Array(5)
                            .fill('')
                            .map((_, i) => (
                            <StarIcon
                                key={i}
                                color={i < avg / recipe.ratings.length ? 'teal.500' : 'gray.300'}
                            />
                            ))}
                    </Box>
                </Box>
            </Box>
        );
    }

    componentWillMount() {
        this.loadRecipe();
    }

    render() {
        return (
            <div
                onClick={() => {
                    if (this.state.menu) this.setState({ menu: false });
                }}
            >
                <Menu
                    open={this.state.menu}
                    setOpen={(open) => this.setState({ menu: open })}
                    role={this.props.role}
                    currentPage={"MyRecipe"}
                />
                <div style={{ margin: "0px 50px" }}>
                    <h1 style={{ textAlign: "center", fontSize: "40px" }}>
                        My Recipe
                    </h1>
                    <div
                        style={{
                            display: "grid",
                            gridTemplateColumns: "auto auto auto auto",
                            gap: "10px",
                        }}
                    >
                        {this.state.recipes.map((recipe, index) =>
                            this.recipeCard(recipe, index)
                        )}
                    </div>
                    {this.state.recipes.length === 0 && (
                        <h4 style={{ textAlign: "center", margin: "50px" }}>
                            Nothing here yet.
                        </h4>
                    )}
                </div>
            </div>
        );
    }
}

if (document.getElementById("my-recipe")) {
    const user_id = document
        .getElementById("my-recipe")
        .getAttribute("user_id");
    const role = document.getElementById("my-recipe").getAttribute("role");
    ReactDOM.render(
        <ChakraProvider><MyRecipe user_id={user_id} role={role} /></ChakraProvider>,
        document.getElementById("my-recipe")
    );
}
