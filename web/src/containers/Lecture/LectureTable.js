import React from 'react';
import {Table} from "semantic-ui-react";
import EntityTable from "../../components/EntityUI/EntityTable";


function LectureTable() {

    return (
        <EntityTable
            route={'lectures'}
            header={(
                <>
                    <Table.HeaderCell>Course</Table.HeaderCell>
                    <Table.HeaderCell>Title</Table.HeaderCell>
                    <Table.HeaderCell>Description</Table.HeaderCell>
                </>
            )}
            row={(d) => (
                <>
                    <Table.Cell width={2}>{d.course.title}</Table.Cell>
                    <Table.Cell width={2}>{d.title}</Table.Cell>
                    <Table.Cell width={2}>{d.description}</Table.Cell>
                </>
            )}
        />

    );
}


export default LectureTable;