import React, { Component } from "react";
import ReactDOM from "react-dom";
import axios from "axios";
import Menu from "./Menu";
import { Container, Button, FormControl, FormLabel, Textarea, Input} from '@chakra-ui/react'
import { Modal, ModalOverlay, ModalContent, ModalFooter, ModalBody, ChakraProvider } from '@chakra-ui/react'

export default class AddRecipe extends Component {
    constructor(props) {
        super(props);
        this.state = {
            recipe: {
                name: "",
                description: "",
                ingredients: "",
                steps: "",
                image: "",
            },
            menu: false,
            messageBox: {
                message: "",
                open: false,
            },
        };
    }

    addRecipe() {
        axios
            .post(`/api/recipe`, {
                user_id: this.props.user_id,
                name: this.state.recipe.name,
                description: this.state.recipe.description,
                ingredients: this.state.recipe.ingredients
                    .split("\n")
                    .join("|"),
                steps: this.state.recipe.steps.split("\n").join("|"),
                image: this.state.recipe.image,
            })
            .then((response) => {
                this.setState({
                    messageBox: {
                        message: "A new recipe is added succesfully.",
                        open: true,
                    },
                });
            });
    }

    messageBox() {
        return (
            <Modal
                closeOnDimmerClick={false}
                isOpen={this.state.messageBox.open}
                size="mini"
                style={{ position: "relative", height: "120px" }}
            >
                <ModalOverlay />
                <ModalContent style={{height:"120px", width:"500px", top:"300px"}}>
                    <ModalBody>
                        <p>{this.state.messageBox.message}</p>
                    </ModalBody>
                    <ModalFooter>
                        <Button colorScheme='blue' mr={3} onClick={() => {
                            this.setState({
                                messageBox: { message: "", open: false },
                            });
                            location.href = "/";
                        }}>
                        Ok
                        </Button>
                    </ModalFooter>
                </ModalContent>
            </Modal>
        );
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
                    currentPage={"NewRecipe"}
                />
                <h1 style={{ fontSize: "40px", color:"white", backgroundColor:"black", textAlign:"center" }}>
                    Add New Food Recipe
                </h1>
                <br></br>
                <Container style={{ size:"100px", maxWidth:"100ch" }}>
                    <FormControl
                        style={{
                            justifyContent: "center",
                            display: "flex",
                        }}
                    >
                        <img
                            src={this.state.recipe.image}
                            onError={(e) => {
                                e.target.src =
                                    "https://www.materialui.co/materialIcons/image/broken_image_black_144x144.png";
                            }}
                            style={{
                                lineHeight: "596px",
                            }}
                            height="596px"
                            width="596px"
                        />
                    </FormControl>
                    <FormControl>
                        <FormLabel
                            style={{
                                fontSize: "16px",
                            }}
                        >
                            Image Link
                        </FormLabel>
                        <Input
                            placeholder={
                                "E.g. https://i2.wp.com/www.eatthis.com/wp-content/uploads//media/images/ext/966368714/kfc-original-chicken-recipe.jpg?resize=640%2C360&ssl=1"
                            }
                            value={this.state.recipe.image}
                            onChange={(e) => {
                                this.setState({
                                    recipe: {
                                        ...this.state.recipe,
                                        image: e.target.value,
                                    },
                                });
                            }}
                        />
                    </FormControl>
                    <FormControl>
                        <FormLabel
                            style={{
                                fontSize: "16px",
                            }}
                        >
                            Food Title
                        </FormLabel>
                        <Input
                            placeholder="E.g. Fried Chicken"
                            value={this.state.recipe.name}
                            onChange={(e) =>
                                this.setState({
                                    recipe: {
                                        ...this.state.recipe,
                                        name: e.target.value,
                                    },
                                })
                            }
                        />
                    </FormControl>
                    <FormControl>
                        <FormLabel
                            style={{
                                fontSize: "16px",
                            }}
                        >
                            Description
                        </FormLabel>
                        <Textarea
                            rows={3}
                            value={this.state.recipe.description}
                            placeholder={
                                "E.g. Finger Licking Good Homemade Chicken"
                            }
                            onKeyDown={(e) => {
                                if (e.key === "Enter") {
                                    e.preventDefault();
                                }
                            }}
                            onChange={(e) =>
                                this.setState({
                                    recipe: {
                                        ...this.state.recipe,
                                        description: e.target.value,
                                    },
                                })
                            }
                        />
                    </FormControl>
                    <FormControl>
                        <FormLabel
                            style={{
                                fontSize: "16px",
                            }}
                        >
                            Ingredients
                        </FormLabel>
                        <Textarea
                            rows={10}
                            value={this.state.recipe.ingredients}
                            placeholder="E.g. 4 chicken thighs&#10;salt, sugar, soy souce, and oil"
                            onChange={(e) =>
                                this.setState({
                                    recipe: {
                                        ...this.state.recipe,
                                        ingredients: e.target.value,
                                    },
                                })
                            }
                        />
                    </FormControl>
                    <FormControl>
                        <FormLabel
                            style={{
                                fontSize: "16px",
                            }}
                        >
                            Steps
                        </FormLabel>
                        <Textarea
                            rows={20}
                            value={this.state.recipe.steps}
                            placeholder={
                                "E.g. Marinate chicken thighs with salt, suger and soy sauce.&#10;Leave it for 3 hours.&#10;Fried the chicken"
                            }
                            onChange={(e) =>
                                this.setState({
                                    recipe: {
                                        ...this.state.recipe,
                                        steps: e.target.value,
                                    },
                                })
                            }
                        />
                    </FormControl>
                    <Button 
                        style={{margin:"20px 20px 20px 0", padding:"20px"}}
                        colorScheme='teal' 
                        variant='solid'
                        type="submit"
                        onClick={this.addRecipe.bind(this)}
                    >
                        Add
                    </Button>
                    <Button
                        style={{margin:"20px 20px 20px 0", padding:"20px"}}
                        colorScheme='teal' 
                        variant='outline'
                        onClick={() => {
                            location.href = "/";
                        }}
                    >
                        Cancel
                    </Button>
                    {this.state.messageBox.open && this.messageBox()}
                </Container>
            </div>
        );
    }
}

if (document.getElementById("add-recipe")) {
    const user_id = document
        .getElementById("add-recipe")
        .getAttribute("user_id");
    const role = document.getElementById("add-recipe").getAttribute("role");
    ReactDOM.render(
        <ChakraProvider><AddRecipe user_id={user_id} role={role} /></ChakraProvider>,
        document.getElementById("add-recipe")
    );
}
