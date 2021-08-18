import React, {useContext, useEffect} from 'react';
import {AppContext} from "../../context";
import {Button, Container, Grid, Icon, Input, Table} from "semantic-ui-react";
import {catchErrorMessage, formatDate} from "../../helpers";
import {useHistory} from "react-router-dom";
import {toast} from "react-toastify";


function EntityTable({route, header, row}) {
    const ctx = useContext(AppContext)
    const history = useHistory()

    const fetch = () => {
        ctx.api
            .get(`/${route}`)
            .then(res => {
                ctx.actions.set(route, res.data)
            })
            .catch(catchErrorMessage)
    }

    useEffect(() => {
        fetch()
        console.log(ctx.store)
    }, [])

    function deleteRecord(id) {
        ctx.api
            .delete(`/${route}/${id}`)
            .then(res => {
                fetch()
                toast("Deleted #" + id)
            })
            .catch(catchErrorMessage)
    }

    const onSearchChange = (e) => {
        const term = e.target.value

        ctx.api
            .get(`/${route}?search=${term}`)
            .then(res => {
                ctx.actions.set(route, res.data)
            })
            .catch(catchErrorMessage)
    };

    return (
        <Container>
            <Grid>
                <Grid.Row>
                    <Grid.Column width={2}>
                        <Button color='green' onClick={e => {
                            history.push(`/${route}/new`)
                        }}>
                            <Icon name='plus'/> New
                        </Button>
                    </Grid.Column>
                    <Grid.Column>
                        <Input
                            onChange={onSearchChange}
                            placeholder={"Search"}
                        />
                    </Grid.Column>
                </Grid.Row>
            </Grid>
            <Table celled stackable>
                <Table.Header>
                    <Table.Row>
                        <Table.HeaderCell>Id</Table.HeaderCell>
                        {header}
                        <Table.HeaderCell>Created At</Table.HeaderCell>
                        <Table.HeaderCell/>
                    </Table.Row>
                </Table.Header>

                <Table.Body>
                    {(ctx.store[route] ?? []).map((d, index) => (
                        <Table.Row key={index}>
                            <Table.Cell width={1}>{d.id}</Table.Cell>

                            {row(d)}

                            <Table.Cell width={2}>{formatDate(d.created_at)}</Table.Cell>
                            <Table.Cell width={2}>
                                <div>
                                    <Button
                                        icon={"edit"}
                                        size={'mini'}
                                        color={'green'}
                                        onClick={() => {
                                            history.push(`/${route}/${d.id}`)
                                        }}
                                    />
                                    <Button
                                        icon={"delete"}
                                        size={'mini'}
                                        color={'red'}
                                        onClick={() => {
                                            deleteRecord(d.id)
                                        }}
                                    />
                                </div>

                            </Table.Cell>

                        </Table.Row>
                    ))}
                </Table.Body>

            </Table>
        </Container>
    );
}


export default EntityTable;