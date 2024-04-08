import React, { Component } from "react";
import ReactDOM from "react-dom";
import axios from "axios";
import Menu from "./Menu";
import { Box, Badge, Image, ChakraProvider } from '@chakra-ui/react'
import { StarIcon } from '@chakra-ui/icons'


export default class PhotoGallery extends Component {
    constructor(props) {
        super(props);
        this.state = {
            recipes: [],
            menu: false,
            action: "",
        };
    }

    loadRecipe() {
        axios.get("/api/recipes").then((response) => {
            this.setState({
                recipes: response.data,
            });
        });
    }

    recipeCard(recipe, index) {
        const sum = recipe.ratings
            .map((rating) => rating.rating)
            .reduce((a, b) => a + b, 0);
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
                }}
                onMouseEnter={() => this.setState({ action: index })}
                onMouseLeave={() => this.setState({ action: "" })}
            >
                <Image src={recipe.image} boxSize='350px' objectFit='cover'/>
                <Box p='6'>
                    <Box display='flex' alignItems='baseline'>
                        <Badge borderRadius='full' px='2' colorScheme='teal'>
                            New
                        </Badge>
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
                        <a href={`/recipe/${recipe.id}`}>{recipe.name}</a>
                    </Box>

                    <Box display='flex' mt='2' alignItems='center'>
                        {Array(5)
                            .fill('')
                            .map((_, i) => (
                            <StarIcon
                                key={i}
                                color={i < sum / recipe.ratings.length ? 'teal.500' : 'gray.300'}
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
                    currentPage={"Home"}
                />
                <div style={{ margin: "0px 50px" }}>
                    <h1 style={{ textAlign: "center", fontSize: "40px", color:"white", backgroundColor:"black" }}>
                        Available Sharing Recipe
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
                </div>
            </div>
        );
    }
}

if (document.getElementById("photo-gallery")) {
    const role = document.getElementById("photo-gallery").getAttribute("role");
    ReactDOM.render(
        <ChakraProvider><PhotoGallery role={role} /></ChakraProvider>,
        document.getElementById("photo-gallery")
    );
}
