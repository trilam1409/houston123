import React from 'react';


const base = (props) => {
    return (
        <div className="row">
            <div class="views-col views-col-1"><pre>{props.method}</pre></div>
            <div class="views-col views-col-2"><a href={props.url} target="blank">{props.url}</a></div>
            <div class="views-col views-col-3"><pre>{props.header}</pre></div>
            <div class="views-col views-col-4"><pre>{props.params}</pre></div>
            <div class="views-col views-col-5"><pre>{props.json}</pre></div>
            <div class="views-col views-col-6"><pre>{props.des}</pre></div>
        </div>
    );
}

export default base;